'use strict';

const webpack = require('webpack');
const autoprefixer = require('autoprefixer');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const FriendlyErrorsPlugin = require('friendly-errors-webpack-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const path = require('path');
const fs = require('fs');

// Make sure any symlinks in the project folder are resolved:
// https://github.com/facebookincubator/create-react-app/issues/637
const appDirectory = fs.realpathSync(process.cwd());

function resolveApp(relativePath) {
	return path.resolve(appDirectory, relativePath);
}

const paths = {
	// appSrc: resolveApp('src'),
	appBuild: resolveApp('build'),
	// appIndexJs: resolveApp('src/index.js'),
	appStylesRoot: resolveApp('sass/style.scss'),
	appNodeModules: resolveApp('node_modules'),
};

// const DEV = process.env.NODE_ENV === 'development';

module.exports = (env, argv) => {
	// +    mode: env.production ? 'production' : 'development',
	const DEV = argv.mode === 'development';

	return {
		bail: !DEV,
		mode: DEV ? 'development' : 'production',
		// We generate sourcemaps in production. This is slow but gives good results.
		// You can exclude the *.map files from the build during deployment.
		target: 'web',
		// devtool: DEV ? 'cheap-eval-source-map' : 'source-map',
		// entry: [paths.appIndexJs],
		entry: [paths.appStylesRoot],
		output: {
			// path: paths.appBuild,
			path: path.resolve(__dirname),
			filename: DEV ? 'bundle.js' : 'bundle.js',
		},
		module: {
			rules: [
				// Disable require.ensure as it's not a standard language feature.
				// { parser: { requireEnsure: false } },
				// Transform ES6 with Babel
				// {
				// 	test: /\.js?$/,
				// 	loader: 'babel-loader',
				// 	include: paths.appSrc,
				// },
				{
					test: /.s(a|c)ss$/,
					use: [
						MiniCssExtractPlugin.loader,
						{
							loader: 'css-loader',
						},
						{
							loader: 'postcss-loader',
							options: {
								ident: 'postcss', // https://webpack.js.org/guides/migrating/#complex-options
								plugins: () => [
									autoprefixer({
										browsers: [
											'>1%',
											'last 4 versions',
											'Firefox ESR',
											'not ie < 9', // React doesn't support IE8 anyway
										],
									}),
								],
							},
						},
						'sass-loader',
					],
				},
			],
		},
		optimization: {
			minimize: !DEV,
			minimizer: [
				new OptimizeCSSAssetsPlugin({
					cssProcessorOptions: {
						map: {
							inline: false,
							annotation: true,
						},
					},
				}),
			],
		},
		plugins: [
			// !DEV && new CleanWebpackPlugin(['build']),
			new MiniCssExtractPlugin({
				// filename: DEV ? 'style.css' : 'bundle.[hash:8].css',
				filename: './assets/dist/css/turbo-style.css',
			}),
			new webpack.EnvironmentPlugin({
				NODE_ENV: 'development', // use 'development' unless process.env.NODE_ENV is defined
				DEBUG: false,
			}),
			DEV &&
				new FriendlyErrorsPlugin({
					clearConsole: false,
				}),
		].filter(Boolean),
		resolve: {
			extensions: ['.scss'],
		},
	};
};
