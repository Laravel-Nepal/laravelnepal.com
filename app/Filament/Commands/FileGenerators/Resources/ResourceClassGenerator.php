<?php

declare(strict_types=1);

namespace App\Filament\Commands\FileGenerators\Resources;

use Filament\Commands\FileGenerators\Resources\ResourceClassGenerator as BaseResourceClassGenerator;
use Filament\Pages\Enums\SubNavigationPosition;
use Filament\Resources\Pages\Page;
use Filament\Support\Commands\FileGenerators\Contracts\FileGenerator;
use Illuminate\Filesystem\Filesystem;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Literal;

final class ResourceClassGenerator extends BaseResourceClassGenerator
{
    protected function addNavigationIconPropertyToClass(ClassType $classType): void
    {
        parent::addNavigationIconPropertyToClass($classType);

        $navigationIcon = $classType->getProperty('navigationIcon');
        $property = $navigationIcon->setValue(new Literal('Heroicon::RectangleStack'));

        $this->configureNavigationIconProperty($property);

        $property = $classType->addProperty('activeNavigationIcon', new Literal('Heroicon::OutlinedRectangleStack'))
            ->setProtected()
            ->setStatic()
            ->setType('string|BackedEnum|null');
        $this->configureNavigationIconProperty($property);
    }

    protected function addPropertiesToClass(ClassType $classType): void
    {
        parent::addPropertiesToClass($classType);

        if ($this->isSimple()) {
            return;
        }

        $this->namespace->addUse(SubNavigationPosition::class);

        $classType->addProperty('subNavigationPosition', new Literal('SubNavigationPosition::Top'))
            ->setProtected()
            ->setStatic()
            ->setType(SubNavigationPosition::class.'|null');
    }

    protected function addMethodsToClass(ClassType $classType): void
    {
        parent::addMethodsToClass($classType);

        if ($this->isSimple()) {
            return;
        }

        $this->namespace->addUse(Page::class);

        $viewPage = array_key_exists('view', $this->getPageRoutes()) ? $this->getPageRoutes()['view']['class'] : null;
        $editPage = array_key_exists('edit', $this->getPageRoutes()) ? $this->getPageRoutes()['edit']['class'] : null;

        $this->namespace->addUse($viewPage);
        $this->namespace->addUse($editPage);

        $methodBody = <<<PHP
            return \$page->generateNavigationItems([
                {$this->simplifyFqn($viewPage)}::class,
                {$this->simplifyFqn($editPage)}::class,
            ]);
            PHP;

        $method = $classType->addMethod('getRecordSubNavigation')
            ->setPublic()
            ->setStatic()
            ->setReturnType('array')
            ->setBody($methodBody);
        $method->addParameter('page')
            ->setType(Page::class);
    }

    protected function writeFile(string $path, string|FileGenerator $contents): void
    {
        $filesystem = resolve(Filesystem::class);

        $filesystem->ensureDirectoryExists(
            pathinfo($path, PATHINFO_DIRNAME),
        );

        $filesystem->put($path, (($contents instanceof FileGenerator) ? $contents->generate() : $contents));
    }
}
