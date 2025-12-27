<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Exception;
use GdImage;
use Illuminate\Console\Command;

final class OptimizeImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ln:optimize-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize the images from content folder';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $folders = [
            'profile' => ['width' => 500, 'height' => 500],
            'logos' => ['width' => 200, 'height' => 200],
            'posts' => ['width' => 1200, 'height' => 630],
            'projects' => ['width' => 1200, 'height' => 630],
            'tips' => ['width' => 1200, 'height' => 630],
        ];

        foreach ($folders as $folder => $dimensions) {
            $files = scandir(base_path('content/images/'.$folder));
            $images = array_diff($files, ['.', '..', '.gitkeep', '.DS_Store']);

            foreach ($images as $image) {
                $this->convertToAVIF($image, $folder, $dimensions['width'], $dimensions['height']);
            }
        }
    }

    /**
     * Converts to AVIV
     */
    private function convertToAVIF(string $fileName, string $folderPrefix, int $width, int $height): void
    {
        $filePath = base_path(sprintf('content/images/%s/%s', $folderPrefix, $fileName));
        $fileInfo = pathinfo($filePath);
        $destinationDirectory = storage_path('app/public/images/'.$folderPrefix);

        if (! is_dir($destinationDirectory)) {
            mkdir($destinationDirectory, 0755, true);
        }

        $avifFilePath = sprintf('%s/%s.avif', $destinationDirectory, $fileInfo['filename']);

        if (file_exists($avifFilePath)) {
            return;
        }

        try {
            $fileContent = file_get_contents($filePath);
            if ($fileContent === false) {
                $this->error('Failed to create image from '.$fileName);

                return;
            }

            /** @var GdImage $image */
            $image = imagecreatefromstring($fileContent);
            $resizedImage = imagescale($image, $width, $height);
            if ($resizedImage === false) {
                $this->error('Failed to resize image '.$fileName);
                imagedestroy($image);

                return;
            }

            if (function_exists('imageavif')) {
                imageavif($resizedImage, $avifFilePath, 80);
                $this->info(sprintf('Converted %s to AVIF format.', $fileName));
            } else {
                $this->error('AVIF conversion not supported on this server.');
            }

            imagedestroy($image);
            imagedestroy($resizedImage);
        } catch (Exception $exception) {
            $this->error(sprintf('Error processing %s: ', $fileName).$exception->getMessage());
        }
    }
}
