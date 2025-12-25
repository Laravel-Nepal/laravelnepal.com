#!/usr/bin/env bash
set -e

CONTENT_DIR="content"
BRANCH="master"

echo "🔄 Updating content repo..."

if [ ! -d "$CONTENT_DIR/.git" ]; then
    echo "📦 Initializing submodule..."
    git submodule update --init --recursive
fi

cd "$CONTENT_DIR"
CURRENT_BRANCH=$(git rev-parse --abbrev-ref HEAD)

if [ "$CURRENT_BRANCH" != "$BRANCH" ]; then
    echo "🌿 Switching submodule to $BRANCH branch..."
    git fetch origin $BRANCH
    git checkout $BRANCH
fi

echo "⬇️ Pulling latest $BRANCH from content repo..."
git reset --hard
git pull origin $BRANCH

echo "🧹 Cleaning up README.md files..."
find . -name "README.md" -type f -delete

cd ..

echo "🔧 Optimizing images..."
php artisan ln:optimize-images

echo "✅ Content repo updated!"
