const path = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const WebpackAssetsManifest = require('webpack-assets-manifest');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const CopyPlugin = require('copy-webpack-plugin');
const SpriteLoaderPlugin = require('svg-sprite-loader/plugin');

module.exports = (env, argv) => {
  const isProduction = argv.mode === 'production';
  const devtool = isProduction ? '' : 'inline-cheap-module-source-map';

  /**
   * TODO:
   * At some point we should re-enable hashing for files. It was disabled to
   * fix issues with merge conflicts since we're not ignoring build files
   */
  const namePattern = '[name]';

  const plugins = [
    new CleanWebpackPlugin(),
    new WebpackAssetsManifest({
      writeToDisk: true
    }),
    new MiniCssExtractPlugin({
      filename: `styles/${namePattern}.css`
    }),
    new SpriteLoaderPlugin(),
    new CopyPlugin([{
      from: 'src/images',
      to: 'images/'
    }], {
      copyUnmodified: true,
      ignore: ['.gitignore']
    })
  ];

  return {
    plugins,
    devtool,
    mode: env,
    context: __dirname,
    entry: [
      './src/scripts/index.js',
      './src/styles/index.scss',
    ],
    module: {
      rules: [
        {
          enforce: 'pre',
          test: /\.(js)$/,
          use: ['eslint-loader', 'import-glob'],
          include: path.resolve(__dirname, 'src/scripts')
        },
        {
          test: /\.(js)$/,
          use: [{ loader: 'babel-loader', options: { configFile: path.resolve(__dirname, 'babel.config.json') }}],
          include: [
            path.resolve(__dirname, 'src/scripts'),
            /node_modules\/micromodal/
          ]
        },
        {
          test: /\.(jpe?g|png|gif|mp4|webm|webp)$/i,
          use: `file-loader?name=images/${namePattern}.[ext]`,
          include: path.resolve(__dirname, 'src/images')
        },
        {
          test: /\.svg$/,
          oneOf: [
            {
              resourceQuery: /sprite/,
              use: [
                {
                  loader: 'svg-sprite-loader',
                  options: {
                    extract: true,
                    spriteFilename: 'images/icons.svg',
                    symbolId: filePath => path.basename(filePath, '.svg')
                  }
                },
                'svgo-loader'
              ],
            },
            {
              use: [
                `url-loader?limit=1000&name=images/${namePattern}.[ext]`,
                'svgo-loader'
              ],
            }
          ],
        },
        {
          test: /\.(woff2?|ttf|eot)$/,
          use: `file-loader?name=fonts/${namePattern}.[ext]`,
          include: path.resolve(__dirname, 'src/fonts'),
        },
        {
          test: /\.s[ac]ss$/i,
          use: [
            MiniCssExtractPlugin.loader,
            'css-loader',
            {
              loader: 'postcss-loader',
              options: {
                ident: 'postcss',
                parser: 'postcss-scss',
                plugins: [require('autoprefixer')()]
              }
            },
            'sass-loader'
          ],
          include: path.resolve(__dirname, 'src/styles')
        }
      ]
    },
    resolve: {
      extensions: ['.js', '.json'],
      modules: [
        path.resolve(__dirname, 'node_modules'),
        'node_modules'
      ]
    },
    optimization: {
      minimize: isProduction,
      minimizer: [new TerserPlugin()],
    },
    output: {
      publicPath: '/wp-content/themes/billbarringer/assets/',
      path: path.join(__dirname, '../wp-content/themes/billbarringer/assets'),
      filename: `scripts/${namePattern}.js`,
      chunkFilename: `scripts/${namePattern}.bundle.js`
    },
    devServer: {
      publicPath: '/assets/',
      contentBase: path.join(__dirname, 'dist'),
      compress: true,
      port: 8000,
      host: 'kps3.me',
      disableHostCheck: true,
      watchContentBase: true,
      writeToDisk: true
    }
  };
};

