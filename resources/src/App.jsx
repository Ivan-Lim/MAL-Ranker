import React, { useState } from 'react';
import './App.css';

function App() {
  const [animeList, setAnimeList] = useState([
    { id: 1, title: 'Attack on Titan', score: 9.0, rank: 1 },
    { id: 2, title: 'Death Note', score: 8.6, rank: 2 },
    { id: 3, title: 'Fullmetal Alchemist: Brotherhood', score: 9.1, rank: 3 },
    { id: 4, title: 'Steins;Gate', score: 9.1, rank: 4 },
    { id: 5, title: 'Hunter x Hunter (2011)', score: 9.0, rank: 5 }
  ]);

  return (
    <div className="App">
      <header className="App-header">
        <h1>MAL Rank Simple</h1>
        <p>Your Anime Ranking List</p>
      </header>

      <main className="anime-list">
        <h2>Top Anime Rankings</h2>
        <div className="list-container">
          {animeList.map((anime) => (
            <div key={anime.id} className="anime-item">
              <div className="rank">#{anime.rank}</div>
              <div className="anime-info">
                <h3>{anime.title}</h3>
                <div className="score">Score: {anime.score}/10</div>
              </div>
            </div>
          ))}
        </div>
      </main>
    </div>
  );
}

export default App;
