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


const ExtractFrontCss = new ExtractTextPlugin('../css/scholar-bundle-front.css');
const ExtractFrontLess = new ExtractTextPlugin('../css/scholar-bundle-front-two.css');


module.exports = function(env) {
  return webpackMerge(commonConfig(), {
    name: 'frontend',
    devtool: 'cheap-module-eval-source-map',
    entry: {
      'scwp-frontend-dashboard-settings' : paths.appSrc + '/frontend-dashboard/frontend-dashboard-settings.js',
      'scwp-frontend-submission'         : paths.appSrc + '/frontend-submission/index.js',
      'scwp-user-profile'         : paths.appSrc + '/user/profile.js',
      'scwp-user-social-profile'         : paths.appSrc + '/user/social-profile.js'
    },
    module: {
      rules:[
        {
          test: /\.css$/,
          use: ExtractFrontCss.extract({
            fallback: 'style-loader',
            use: 'css-loader'
          }),
        },
        {
          test: /\.less$/,
          use: ExtractFrontLess.extract({
            fallback: 'style-loader',
            use: [
              'css-loader?modules&importLoaders=2&sourceMap&localIdentName=[local]___[hash:base64:5]',
              'less-loader?outputStyle=expanded&sourceMap',
            ]
          }),
        },
      ],
    },
    output: {
      path: paths.appDest,
      filename: '[name].js',
      chunkFilename: '[name].chunk.js',
    },
    plugins: [
      new webpack.DefinePlugin({
        __DEV__: JSON.stringify('dev')
      }),
      ExtractFrontCss,
      ExtractFrontLess,
      new webpack.optimize.CommonsChunkPlugin({
        name: 'vendor',
        filename: 'scwp_forntend_vendor.js',
        minChunks: function (module) {
           // this assumes your vendor imports exist in the node_modules directory
           return module.context && module.context.indexOf('node_modules') !== -1;
        },
      }),
      new CaseSensitivePathsPlugin(),
      new WatchMissingNodeModulesPlugin(paths.appNodeModules),
      new AssetsPlugin({ fullPath: false, prettyPrint: true, filename: './resource/frontend-assets.json'}),
      new notify({ title: 'Webpack', sound: 'Glass' }),
    ]
  });
}
