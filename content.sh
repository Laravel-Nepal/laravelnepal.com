#!/usr/bin/env bash
set -e

CONTENT_DIR="content"
REPO_URL="https://github.com/Laravel-Nepal/content.git"
BRANCH="master"

echo "🔄 Syncing content repo..."

if [ -d "$CONTENT_DIR/.git" ]; then
  git -C "$CONTENT_DIR" fetch origin "$BRANCH"
  git -C "$CONTENT_DIR" reset --hard "origin/$BRANCH"
else
  git clone --depth=1 --branch "$BRANCH" "$REPO_URL" "$CONTENT_DIR"
fi

echo "🧹 Cleaning up README.md files..."
find "$CONTENT_DIR" -name "README.md" -type f -delete

echo "💾 Caching content..."
php artisan orbit:cache

echo "🔧 Optimizing images..."
php artisan ln:optimize-images

echo "🔍 Generating SEO for missing entries..."
php artisan seo:generate

echo "✅ Content repo synced!"
