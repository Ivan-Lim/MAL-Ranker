import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';

function Login() {
  const [username, setUsername] = useState('');
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState('');
  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();

    if (!username.trim()) {
      setError('Please enter a MyAnimeList username');
      return;
    }

    setLoading(true);
    setError('');

    try {
      const response = await fetch('/api/mal/user-anime-list', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
        },
        body: JSON.stringify({ username: username.trim() })
      });

      const data = await response.json();

      if (response.ok && data.data && Array.isArray(data.data) && data.data.length > 0) {
        // Store the username and anime data in sessionStorage for the rankings page
        sessionStorage.setItem('mal_username', username.trim());
        sessionStorage.setItem('mal_anime_data', JSON.stringify(data));

        // Navigate to rankings page
        navigate('/rankings');
      } else {
        setError(data.error || 'No scored anime found for this user, or user does not exist.');
      }
    } catch (err) {
      setError('Network error. Please try again.');
    } finally {
      setLoading(false);
    }
  };

  return (
    <div className="login-page">
      <header className="App-header">
        <h1>MAL Ranker</h1>
        <p>Enter a MyAnimeList username to view their anime rankings</p>
      </header>

      <main className="login-content">
        <div className="search-section">
          <form onSubmit={handleSubmit} className="search-form">
            <div className="input-group">
              <label htmlFor="username">MyAnimeList Username</label>
              <input
                type="text"
                id="username"
                value={username}
                onChange={(e) => setUsername(e.target.value)}
                placeholder="Enter MAL username (e.g., Aerophobic)"
                disabled={loading}
                required
              />
            </div>
            <button type="submit" className="search-button" disabled={loading}>
              {loading ? 'Loading...' : 'Get Anime Rankings'}
            </button>
          </form>

          {error && <div className="error-message">{error}</div>}
        </div>
      </main>
    </div>
  );
}

export default Login;