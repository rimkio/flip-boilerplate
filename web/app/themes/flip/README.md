# Wordpress Toolkit Starter Theme

## Initial Setup and Build

Upon installation of the theme in a dev environment, make sure to run the following commands in the root directory of the theme to setup things...
```shell
npm install 
npm run dev
npm run watch
npm run prod
```

This will compile the blocks, and assets for the theme and let you get straight into development.

If you wish to disable the main Gutenburg stylesheets on the frontend, uncomment `Line 18` in `functions/reset.php` and this will unenqueue the front-end styles that come from Gutenburg.

There is a shortcut script to compile assets + blocks at the same time with `npm run dev`.

## Block Development

This theme allows the developer to add their own custom blocks to the Gutenburg editing experience. All blocks are compiled with `@wordpress/scripts` and are included in the theme via the `functions/blocks.php` file. You can check this file out and edit it to change things how you see fit.

### Theme-based Blocks

To develop new blocks in the theme, create them wtihin the `assets/blocks` folder and import the block's entrypoint in `assets/blocks/custom-blocks.js`

You will also need to add the blocks namespace (the one you use when registering with `registerCustomBlock('example/test-block', ...{})`) to the `assets/blocks/blocks-manifest.php` file so it can be registered into the Gutenburg framework.

### Block Styles

You can add extra block styles to the `assets/blocks/block-styles.js` file and they will be part of the compilation process.

### Scoped Theme Classes

In the theme there is a SASS mixin included in the `assets/css/_mixins.scss` file.

First, you'll need to define your scoped name in `assets/scss/_vars.scss` like so...
```scss
$settings: (
  "scoped-name": "flip",
);
```

Then, for example, when you have the following block style defined...
```js
wp.blocks.registerBlockStyle( 'core/heading', {
	name: 'ausdeck-callout-heading',
	label: 'Ausdeck Callout Heading',
} );
```

You can apply it within your stylesheets like so...
```scss
@include theme-scoped {
  &-callout-heading {
    font-size: 1.75em;
    color: map_get($themeColors, "medium-blue");
    font-weight: 500;
    line-height: 1; // squish it together.
    font-family: "FS Untitled", "Helvetica", sans-serif;
  }
}
```

This will output something like...
```css
.is-style-ausdeck-callout-heading {
    font-size: 1.75em;
    color: #000;
    font-weight: 500;
    line-height: 1; // squish it together.
    font-family: "FS Untitled", "Helvetica", sans-serif;
}
```

## Asset Management

There are JS and SCSS folders within `assets` as well as a custom `webpack.config.js` in that folder to control the build processes. The main `build:dev` task uses this config to build and compile the assets.

Currently, this theme ships with Bootstrap SASS by default and is included in the `assets/scss/_vendor.scss` file.

## Template Hierarchy and Custom Pages

Everything else about the theme is stock-standard and is actually forked from _S's, the Wordpress-backed sane-defaults theme and has been extended to meet our purposes for custom development.

If you have any questions or want to submit a PR, please contact me at wordpress@weareflip.com

## Animation load between pages
can you run it like this to try and mimic that animation effect?
When loading in a new page:
1/ Run the animation
2/Set the opacity of all elements on the page to 1

Do the reverse when navigating to a new page/clicking on a link:
1/ Set the opacity of all elements on the page to 0
2/ Run the animation
3/ Navigate to the new page
