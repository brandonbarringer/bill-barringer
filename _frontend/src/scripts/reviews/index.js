import { getState, setState } from '../state';


const reviews = () => {
  const auth = async () => {
    const response = await fetch(`${getState('api.url.base')}${'api.url.endpoint.auth'}`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        username: process.env.EXPERIENCE_USERNAME,
        password: process.env.EXPERIENCE_PASSWORD,
      }),
    });

    const data = await response.json();

    setState('api.authToken', data.data.auth_token);
  };

  const get = async (args = {}) => {
    const defaults = {
      app_id: '',
      app_secret: '',
      account_id: '',
      agent_email: '',
      field: '',
      page: 1,
      limit: 10,
      min_date: '',
      max_date: '',
      rating_min: 0,
      rating_max: 5,
    };

    const url = `${getState('api.url.base')}${getState('api.url.endpoint.reviews')}`;
    const params = Object.assign({}, defaults, args);
    const headers = {
      'Content-Type': 'application/json',
      'X-Experience-API-Version': '2',
      'X-Experience-Application': params.app_id,
      'X-Experience-Secret': params.app_secret,
    };

    const response = await fetch(url, {
      method: 'POST',
      headers,
      body: JSON.stringify(params),
    });

    const data = await response.json();

    setState('reviews', data.data);
  };
};