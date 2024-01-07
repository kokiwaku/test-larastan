export async function fetchData(url, method = 'GET', data = null, headers = {}) {
  const options = {
    method,
    headers: {
      'Content-Type': 'application/json',
      ...headers
    },
    body: method !== 'GET' ? JSON.stringify(data) : null
  };

  try {
    const response = await fetch(url, options);
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    const responseData = await response.json();
    return responseData;
  } catch (error) {
    console.error('Fetch Error:', error);
    throw error;
  }
}
