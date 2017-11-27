const path = require('path');

module.exports = {
  // エントリーポイントの設定
  entry: './js/app.js',
  // 出力の設定
  output: {
    // 出力するファイル名
    filename: 'bundle.js',
    // 出力先のパス（v2系以降は絶対パスを指定する必要がある）
    path: path.join(__dirname, 'js')
  },
  module:{
    loaders:[{
      test: /\.js$/,
      exclude: /node_modules/,
      loader: 'babel-loader',
      query:{
        presets:'es2015'
      }
    },
    {
      test: /\.vue$/,
      loader: [
        'vue-loader'
      ]
    },
    {
      test: /\.css$/,
      loader: 'style-loader!css-loader!'
    },
    {
      test: /\.(eot|svg|woff|ttf|gif)$/,
      loader: 'url-loader'
    }
    ]
  },
  resolve: {
    extensions: ['*', '.js', '.css'],
    alias: {
    // vue.js のビルドを指定する
      'vue$': 'vue/dist/vue.min.js',
      // slick: 'slick-carousel/slick/',
    }
  }
};