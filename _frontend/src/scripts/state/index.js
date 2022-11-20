import isProd from "../getEnv";

const state = {
  _state: {
    api: {
      url: {
        base: isProd ? 'https://api.experience.io' : 'https://api.sandbox.experience.com',
        endpoint: {
          auth: '/v2/core/login',
          reviews: '/v2/public/reviews/get_reviews',
        }
      },
      authToken: '',
    },
    reviews: [],
  },
};

const getState = (path) => {
  const pathArray = path.split('.');
  return pathArray.reduce((obj, key) => obj && obj[key], state._state);
}


const setState = (path, value) => {
  const recreateState = (object, path, value) => {
    const pathArray = path.split('.');
    const lastKey = pathArray.pop();
    const lastObj = pathArray.reduce((obj, key) => obj[key] = obj[key] || {}, object);
    lastObj[lastKey] = value;
    return object;
  };

  state._state = recreateState(state._state, path, value);
};

const watchState = (path, callback) => {
  const pathArray = path.split('.');
  const lastKey = pathArray.pop();
  const lastObj = pathArray.reduce((obj, key) => obj[key] = obj[key] || {}, state._state);

  Object.defineProperty(lastObj, lastKey, {
    get: () => lastObj[lastKey],
    set: (value) => {
      lastObj[lastKey] = value;
      callback(value);
    },
  });

  return lastObj[lastKey];
};

export {
  getState,
  setState,
  watchState,
};