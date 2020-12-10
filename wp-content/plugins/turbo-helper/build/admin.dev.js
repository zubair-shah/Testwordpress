/* eslint-disable */
const autoprefixer = require('autoprefixer');
const webpack = require('webpack');
const webpackMerge = require('webpack-merge');
const notify = require('webpack-notifier');
const WebpackMd5Hash = require('webpack-md5-hash');
const AssetsPlugin = require('assets-webpack-plugin');
const OfflinePlugin = require('offline-plugin');
const SWPrecacheWebpackPlugin = require('sw-precache-webpack-plugin');
const CaseSensitivePathsPlugin = require('case-sensitive-paths-webpack-plugin');
const WatchMissingNodeModulesPlugin = require('react-dev-utils/WatchMissingNodeModulesPlugin');
const ChunkManifestPlugin = require('chunk-manifest-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

const paths = require('./paths');
const commonConfig = require('./base');

const ExtractAdminCss = new ExtractTextPlugin(
  '../css/scholar-bundle-admin.css'
);
const ExtractAdminLess = new ExtractTextPlugin(
  '../css/scholar-bundle-admin-two.css'
);

module.exports = function(env) {
  return webpackMerge(commonConfig(), {
    name: 'admin',
    devtool: 'cheap-module-eval-source-map',
    entry: {
      turbo_dynamic_page_settings:
        paths.appSrc + '/page/dynamicPageGenerator.js',
      turbo_dynamic_post_settings:
        paths.appSrc + '/page/dynamicPostGenerator.js',
    },
    output: {
      path: paths.appDest,
      filename: '[name].js',
      chunkFilename: '[name].chunk.js',
    },
    module: {
      rules: [
        {
          test: /\.css$/,
          use: ExtractAdminCss.extract({
            fallback: 'style-loader',
            use: 'css-loader',
          }),
        },
        {
          test: /\.less$/,
          use: ExtractAdminLess.extract({
            fallback: 'style-loader',
            use: [
              'css-loader?modules&importLoaders=2&sourceMap&localIdentName=[local]___[hash:base64:5]',
              'less-loader?outputStyle=expanded&sourceMap',
            ],
          }),
        },
      ],
    },
    plugins: [
      new webpack.DefinePlugin({
        __DEV__: JSON.stringify('dev'),
      }),
      ExtractAdminCss,
      ExtractAdminLess,
      new CaseSensitivePathsPlugin(),
      new WatchMissingNodeModulesPlugin(paths.appNodeModules),
      new AssetsPlugin({
        fullPath: false,
        prettyPrint: true,
        filename: './resource/admin-assets.json',
      }),
      new notify({ title: 'Webpack', sound: 'Glass' }),
    ],
  });
};
