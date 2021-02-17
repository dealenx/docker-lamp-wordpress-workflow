var path = require("path");
var webpack = require("webpack");
if (!global || !global._babelPolyfill) {
  require("babel-polyfill");
}

const ExtractTextPlugin = require("extract-text-webpack-plugin");

// const { VueLoaderPlugin } = require("vue-loader");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const BundleAnalyzerPlugin = require("webpack-bundle-analyzer")
  .BundleAnalyzerPlugin;

const CompressionPlugin = require("compression-webpack-plugin");

const antdTheme = {
  "primary-color": "#CC0000",
};

const css = {
  loader: "css-loader",
  options: {
    url: false,
  },
};

const sass = {
  loader: "sass-loader",
  options: {
    sourceMap: true,
    outputStyle: "compressed",
  },
};

module.exports = {
  // entry: "./src/main.js",
  entry: {
    app: ["babel-polyfill", "./src/main.js"],
  },
  externals: {
    jquery: "jQuery",
  },

  module: {
    rules: [
      {
        test: /\.css$/,
        use: ["vue-style-loader", "css-loader"],
      },
      {
        test: /\.less$/,
        use: [
          {
            loader: "style-loader",
          },
          {
            loader: "css-loader", // translates CSS into CommonJS
          },
          {
            loader: "less-loader", // compiles Less to CSS
            options: {
              modifyVars: antdTheme,
              javascriptEnabled: true,
            },
          },
        ],
      },

      {
        test: /\.scss$/,
        // use: ["vue-style-loader", "css-loader", "sass-loader?indentedSyntax"],
        use: [MiniCssExtractPlugin.loader, css, sass],
      },
      // {
      //   test: /\.vue$/,
      //   loader: "vue-loader",
      //   options: {
      //     loaders: {
      //       // Since sass-loader (weirdly) has SCSS as its default parse mode, we map
      //       // the "scss" and "sass" values for the lang attribute to the right configs here.
      //       // other preprocessors should work out of the box, no loader config like this necessary.
      //       scss: ["vue-style-loader", "css-loader", "sass-loader"],
      //       sass: [
      //         "vue-style-loader",
      //         "css-loader",
      //         "sass-loader?indentedSyntax",
      //       ],
      //     },
      //     // other vue-loader options go here
      //   },
      // },
      {
        test: /\.js$/,
        loader: "babel-loader",
        exclude: /node_modules/,
      },
      {
        test: /\.(png|jpg|gif|svg)$/,
        loader: "file-loader",
        options: {
          name: "[name].[ext]?[hash]",
        },
      },
    ],
  },
  resolve: {
    alias: {
      vue$: "vue/dist/vue.esm.js",
    },
    extensions: ["*", ".js", ".vue", ".json"],
  },
  devServer: {
    historyApiFallback: true,
    noInfo: true,
    overlay: true,
  },
  performance: {
    hints: false,
  },
  optimization: {
    chunkIds: "named",
    splitChunks: {
      cacheGroups: {
        commons: {
          chunks: "initial",
          minChunks: 2,
          maxInitialRequests: 5, // The default limit is too small to showcase the effect
          minSize: 0, // This is example is too small to create commons chunks
        },
        vendor: {
          test: /node_modules/,
          chunks: "initial",
          name: "vendor",
          priority: 10,
          enforce: true,
        },
      },
    },
  },

  output: {
    path: path.join(__dirname, "dist"),
    filename: "[name].js",
  },

  plugins: [
    // new VueLoaderPlugin(),
    new MiniCssExtractPlugin("[name].css"),
    new BundleAnalyzerPlugin(),
    new CompressionPlugin({
      algorithm: "gzip",
    }),
  ],

  // plugins: [new ExtractTextPlugin("style.css")]
};
