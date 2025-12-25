<?php

declare(strict_types=1);

namespace App\Filament\Commands\FileGenerators\Resources;

use Filament\Commands\FileGenerators\Resources\Schemas\ResourceInfolistSchemaClassGenerator as BaseResourceInfolistSchemaClassGenerator;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Illuminate\Database\Eloquent\Model;
use Nette\PhpGenerator\Literal;

final class ResourceInfolistSchemaClassGenerator extends BaseResourceInfolistSchemaClassGenerator
{
    /**
     * @param  ?class-string<Model>  $model
     * @param  array<string>  $exceptColumns
     */
    public function outputInfolistComponents(?string $model = null, array $exceptColumns = []): string
    {
        $components = $this->getInfolistComponents($model, $exceptColumns);
        $this->importUnlessPartial(Section::class);

        foreach ($components as &$component) {
            $lines = explode(PHP_EOL, $component);
            foreach ($lines as &$line) {
                $line = '        '.$line;
            }

            $component = implode(PHP_EOL, $lines);
        }

        if ($components === []) {
            $recordTitleAttribute = $this->getRecordTitleAttribute();

            if (blank($recordTitleAttribute)) {
                return '//';
            }

            $this->importUnlessPartial(TextEntry::class);

            $componentsString = new Literal(<<<PHP
                {$this->simplifyFqn(TextEntry::class)}::make(?),
                PHP, [$recordTitleAttribute]);
        } else {
            $componentsString = implode(PHP_EOL.'        ', $components);
        }

        return (string) new Literal(<<<PHP
            {$this->simplifyFqn(Section::class)}::make()
                        ->columns()
                        ->columnSpanFull()
                        ->components([
                    {$componentsString}
                        ]),
            PHP);
    }
}
