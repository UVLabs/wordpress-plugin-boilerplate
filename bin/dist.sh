#!/usr/bin/env bash

# Check PHP compatibility.
if ! composer compat; then
    echo "PHP compatibility check failed. Aborting distribution process."
    exit 1
fi

# Start fresh
rm -rf dist
rm -rf artifact

# Make our directories
mkdir -p dist
mkdir -p artifact

# Remove vendor folder so we can redownload without dev dependencies.
rm -rf vendor

# Install without dev dependencies and optimize composer.
composer install --no-dev -o
composer dumpautoload -o

# Run Prettier
npm run format

# Build our JS files with parcel
npm run build

# Sync dist folder
rsync -acvP --delete --exclude-from=".distignore" ./ "./dist"

#Change to our dist folder and zip to artifact folder
(cd dist && zip -r ../artifact/prefix.zip .)

# Delete dist folder
rm -rf dist

# Re-add dev dependencies
composer install
composer dumpautoload

