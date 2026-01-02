import React, { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';

function Rankings() {
  const [animeList, setAnimeList] = useState([]);
  const [username, setUsername] = useState('');
  const navigate = useNavigate();

  useEffect(() => {
    // Check if we have data from the login
    const storedUsername = sessionStorage.getItem('mal_username');
    const storedAnimeData = sessionStorage.getItem('mal_anime_data');

    if (!storedUsername || !storedAnimeData) {
      // No data, redirect to login
      navigate('/login');
      return;
    }

    setUsername(storedUsername);

    // Process the stored anime data
    const data = JSON.parse(storedAnimeData);
    if (data.data && Array.isArray(data.data)) {
      const formattedAnime = data.data
        .filter(item => item.list_status && item.list_status.score > 0) // Only include scored anime
        .sort((a, b) => b.list_status.score - a.list_status.score) // Sort by score descending
        .map((item, index) => ({
          id: item.node.id,
          title: item.node.title,
          score: item.list_status.score,
          rank: index + 1,
          status: item.list_status.status,
          episodes: item.node.num_episodes || 'Unknown'
        }));

      setAnimeList(formattedAnime);
    }
  }, [navigate]);

  const handleLogout = () => {
    // Clear stored data
    sessionStorage.removeItem('mal_username');
    sessionStorage.removeItem('mal_anime_data');

    // Navigate back to login
    navigate('/login');
  };

  const handleNewSearch = () => {
    // Clear stored data and go back to login
    sessionStorage.removeItem('mal_username');
    sessionStorage.removeItem('mal_anime_data');
    navigate('/login');
  };

  return (
    <div className="rankings-page">
      <header className="App-header">
        <div className="header-content">
          <div>
            <h1>MAL Ranker</h1>
            <p>{username}'s Anime Rankings</p>
          </div>
          <div className="header-buttons">
            <button onClick={handleNewSearch} className="new-search-button">
              New Search
            </button>
            <button onClick={handleLogout} className="logout-button">
              Logout
            </button>
          </div>
        </div>
      </header>

      <main className="anime-list">
        <div className="rankings-info">
          <h2>Top Anime Rankings</h2>
          <p className="anime-count">{animeList.length} anime found</p>
        </div>

        {animeList.length > 0 ? (
          <div className="list-container">
            {animeList.map((anime) => (
              <div key={anime.id} className="anime-item">
                <div className="rank">#{anime.rank}</div>
                <div className="anime-info">
                  <h3>{anime.title}</h3>
                  <div className="anime-details">
                    <span className="score">Score: {anime.score}/10</span>
                    <span className="episodes">Episodes: {anime.episodes}</span>
                    <span className={`status status-${anime.status.toLowerCase()}`}>
                      {anime.status}
                    </span>
                  </div>
                </div>
              </div>
            ))}
          </div>
        ) : (
          <div className="no-anime">
            <p>No scored anime found for "{username}".</p>
            <p>Make sure the username is correct and they've rated some anime!</p>
          </div>
        )}
      </main>
    </div>
  );
}

export default Rankings;
