#!/usr/bin/env bash
set -e

CONTENT_DIR="content"
BRANCH="master"

echo "🔄 Updating content repo..."

git submodule update --init --recursive --remote --checkout

echo "🧹 Cleaning up README.md files..."
find "$CONTENT_DIR" -name "README.md" -type f -delete

echo "🔧 Optimizing images..."
php artisan ln:optimize-images

echo "✅ Content repo updated!"
