module.exports = {
  env: {
    browser: true,
    es6: true,
    jquery: true
  },
  extends: [
    "eslint:recommended",
    "jquery",
  ],
  globals: {
    Atomics: 'readonly',
    SharedArrayBuffer: 'readonly'
  },
  parserOptions: {
    ecmaVersion: 2018
  },
  rules: {
    "semi": ["error", "always"],
    "quotes": ["error", "double"]
  }
}