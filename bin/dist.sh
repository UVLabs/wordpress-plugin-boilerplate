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

# The plugin's folder name on the live site. The zip contains this one folder, so WordPress installs into it and
# offers to replace the existing plugin. Without it, WordPress names the folder after its temporary extract folder
# and installs a second copy.
PLUGIN_FOLDER="prefix"

# Sync dist folder
rsync -acvP --delete --exclude-from=".distignore" ./ "./dist/${PLUGIN_FOLDER}"

#Change to our dist folder and zip to artifact folder
(cd dist && zip -r "../artifact/${PLUGIN_FOLDER}.zip" "${PLUGIN_FOLDER}")

# Delete dist folder
rm -rf dist

# Re-add dev dependencies
composer install
composer dumpautoload

