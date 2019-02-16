#!/bin/bash

# CONFIGURATION
USER_ROOT="/path/to/your/app"
DIRECTORY_SLUG=$(date "+%Y%m%d-%s")
TMP_DIRECTORY_SLUG=$(date "+%s")
GIT_REPO_OWNER="sharapov-outsource"
GIT_REPO_NAME="dockerized-php-skeleton-app"
APACHE_USER="www-data"
APACHE_GROUP="www-data"

# Bitbucket/github repos. You can use your own repo.
# git@bitbucket.org
# git@github.com
# git@gitlab.com
GIT_REPO="git@gitlab.com:"${GIT_REPO_OWNER}/${GIT_REPO_NAME}".git"

set -e
clear

# ASK INFO
echo "-----------------------------------------------"
echo "                RELEASE BUILDER                "
echo "                     BETA 2                    "
echo "Created by Sharapov A. (alexander@sharapov.biz)"
echo "-----------------------------------------------"
echo ""
read -p "TAG AND RELEASE VERSION: " VERSION
echo ""
echo "-----------------------------------------------"
echo ""
echo "Before continuing, confirm that you have done the following :)"
echo ""
read -p " - Added a changelog for "${VERSION}"?"
read -p " - Set version in the readme.txt and main file to "${VERSION}"?"
read -p " - Set stable tag in the readme.txt file to "${VERSION}"?"
read -p " - Updated the POT file?"
read -p " - Committed all changes up to GIT?"
echo ""
read -p "PRESS [ENTER] TO BEGIN RELEASING "${VERSION}" "
clear

# VARS
ROOT_PATH=$(pwd)"/"
TARGET_RELEASE_DIR="release/"${DIRECTORY_SLUG}"-git"
TARGET_TMP_DIR="release/"${TMP_DIRECTORY_SLUG}

# CLONE GIT DIR
echo "Cloning GIT repository to the temp directory"
git clone --progress $GIT_REPO $TARGET_TMP_DIR  ||  { echo "Unable to clone repo"$GIT_REPO; exit 1; }

# MOVE INTO GIT DIR
cd $ROOT_PATH$TARGET_TMP_DIR

echo ""
read -p "PRESS [ENTER] TO DEPLOY TAG "${VERSION}

# CHECKOUT RELEASE
echo "Checkout "${VERSION}
git checkout ${VERSION}  ||  { echo "Unable to checkout "${VERSION}; exit 1; }

echo "Coping composer.json and package.json"
cp composer.* $USER_ROOT/shared
cp package* $USER_ROOT/shared

# RENAME TO RELEASE DIR
mv $ROOT_PATH$TARGET_TMP_DIR $ROOT_PATH$TARGET_RELEASE_DIR

# MOVE INTO GIT DIR
cd $ROOT_PATH$TARGET_RELEASE_DIR

# SAVE VERSION ID
echo ${VERSION} >> version.md

# CHANGING FILE PERMISSIONS
echo "Changing file permissions"
find $ROOT_PATH$TARGET_RELEASE_DIR -type d -exec chmod 755 {} \;
find $ROOT_PATH$TARGET_RELEASE_DIR -type f -exec chmod 644 {} \;

chown -R $APACHE_USER.$APACHE_USER $ROOT_PATH$TARGET_RELEASE_DIR

echo "Creating symlinks"
#ln -sfnv $USER_ROOT/shared/node_modules $ROOT_PATH$TARGET_RELEASE_DIR/node_modules

#echo "Running grunt tasks"
#grunt

echo "Cleaning up"
rm -f package*
rm -f Gruntfile.js
rm -Rf .sass-cache
rm -Rf .git
rm -Rf etc
rm -f .gitignore
rm -f composer.*
rm -f *.bat
rm -f *.yml
rm -f .env
rm -f *.md
rm -f *.sh

echo "Changing symlinks owner"
chown -h $APACHE_USER.$APACHE_GROUP $ROOT_PATH$TARGET_RELEASE_DIR/public

read -p "PRESS [ENTER] TO CHANGE WEB-ROOT AND RUN TAG "${VERSION}

echo "Changing web root"
ln -sfnv $ROOT_PATH$TARGET_RELEASE_DIR/public $USER_ROOT/public
chown -h $APACHE_USER.$APACHE_GROUP $USER_ROOT/public

# Changing web root in the container config file
sed -i '/set $host_path/c\set $host_path "'${ROOT_PATH}${TARGET_RELEASE_DIR}'/public";' $USER_ROOT/etc/nginx/skeleton_app_vhost.conf

echo "Version "${VERSION}" has been released"
