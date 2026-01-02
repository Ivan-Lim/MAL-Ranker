<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAL Rank Simple</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .header {
            background-color: #282c34;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }

        .anime-list h2 {
            color: #282c34;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        .list-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .anime-item {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .rank {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
            margin-right: 15px;
            min-width: 50px;
            text-align: center;
        }

        .anime-info {
            text-align: left;
            flex: 1;
        }

        .anime-info h3 {
            margin: 0 0 5px 0;
            color: #333;
            font-size: 1.1rem;
        }

        .score {
            color: #666;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>MAL Rank Simple</h1>
        <p>Your Anime Ranking List</p>
    </div>

    <div class="container">
        <div class="anime-list">
            <h2>Top Anime Rankings</h2>
            <div class="list-container">
                <div class="anime-item">
                    <div class="rank">#1</div>
                    <div class="anime-info">
                        <h3>Attack on Titan</h3>
                        <div class="score">Score: 9.0/10</div>
                    </div>
                </div>

                <div class="anime-item">
                    <div class="rank">#2</div>
                    <div class="anime-info">
                        <h3>Death Note</h3>
                        <div class="score">Score: 8.6/10</div>
                    </div>
                </div>

                <div class="anime-item">
                    <div class="rank">#3</div>
                    <div class="anime-info">
                        <h3>Fullmetal Alchemist: Brotherhood</h3>
                        <div class="score">Score: 9.1/10</div>
                    </div>
                </div>

                <div class="anime-item">
                    <div class="rank">#4</div>
                    <div class="anime-info">
                        <h3>Steins;Gate</h3>
                        <div class="score">Score: 9.1/10</div>
                    </div>
                </div>

                <div class="anime-item">
                    <div class="rank">#5</div>
                    <div class="anime-info">
                        <h3>Hunter x Hunter (2011)</h3>
                        <div class="score">Score: 9.0/10</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
