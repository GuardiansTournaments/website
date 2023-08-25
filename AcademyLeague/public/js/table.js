// Sample player data
let players = [];

// Check if data exists in local storage and load it
if (localStorage.getItem("players")) {
    players = JSON.parse(localStorage.getItem("players"));
}

// Display the leaderboard
function displayLeaderboard() {
    const playerRows = document.getElementById("playerRows");

    // Clear the existing player rows
    playerRows.innerHTML = "";

    // Sort players by MMR (descending order)
    const sortedPlayers = players.sort((a, b) => b.mmr - a.mmr);

    // Add player rows to the leaderboard
    sortedPlayers.forEach((player, index) => {
        const row = document.createElement("tr");

        const nameCell = document.createElement("td");
        nameCell.textContent = player.name;
        row.appendChild(nameCell);

        const mmrCell = document.createElement("td");
        mmrCell.textContent = player.mmr;
        row.appendChild(mmrCell);

        const rankCell = document.createElement("td");
        rankCell.textContent = getRank(player.mmr);
        rankCell.style.color = getRankColor(player.mmr);
        row.appendChild(rankCell);

        const winsCell = document.createElement("td");
        winsCell.textContent = player.wins;
        row.appendChild(winsCell);

        const lossesCell = document.createElement("td");
        lossesCell.textContent = player.losses;
        row.appendChild(lossesCell);

        const wlRatioCell = document.createElement("td");
        wlRatioCell.textContent = calculateWinLossRatio(player.wins, player.losses);
        row.appendChild(wlRatioCell);

        if (isAdmin) {
            const deleteCell = document.createElement("td");
            const deleteButton = document.createElement("button");
            deleteButton.textContent = "Delete";
            deleteButton.addEventListener("click", function () {
                deletePlayer(index);
            });
            deleteCell.appendChild(deleteButton);
            row.appendChild(deleteCell);
        }

        playerRows.appendChild(row);
    });
}

// Get rank based on MMR
function getRank(mmr) {
    if (mmr >= 0 && mmr < 50) {
        return "Verified";
    } else if (mmr >= 50 && mmr < 100) {
        return "Competitor";
    } else if (mmr >= 100 && mmr < 200) {
        return "Mystic";
    } else if (mmr >= 200 && mmr < 350) {
        return "Elite";
    } else if (mmr >= 350 && mmr < 500) {
        return "Legend";
    } else {
        return "Prestige";
    }
}

// Get rank color based on MMR
function getRankColor(mmr) {
    if (mmr >= 0 && mmr < 50) {
        return "green";
    } else if (mmr >= 50 && mmr < 100) {
        return "yellow";
    } else if (mmr >= 100 && mmr < 200) {
        return "blue";
    } else if (mmr >= 200 && mmr < 350) {
        return "red";
    } else if (mmr >= 350 && mmr < 500) {
        return "purple";
    } else {
        return "purple";
    }
}

// Calculate win/loss ratio
function calculateWinLossRatio(wins, losses) {
    if (wins === 0 && losses === 0) {
        return "-";
    }
    return (wins / (wins + losses)).toFixed(2);
}

let isAdmin = false;

// Show admin panel on admin button click
document.getElementById("adminButton").addEventListener("click", function () {
    const password = prompt("Enter password:");

    // Perform password validation here
    if (password === "123") {
        isAdmin = true;
        document.getElementById("adminPanel").style.display = "block";
        document.getElementById("deleteButton").style.display = "block";
    } else {
        alert("Invalid password. Access denied.");
    }
});

// Add player to the leaderboard on form submit
document.getElementById("adminForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const playerName = document.getElementById("playerName").value;
    const mmr = parseInt(document.getElementById("mmr").value);
    const wins = parseInt(document.getElementById("wins").value);
    const losses = parseInt(document.getElementById("losses").value);

    // Create a new player object
    const newPlayer = {
        name: playerName,
        mmr: mmr,
        wins: wins,
        losses: losses
    };

    // Add the new player to the players array
    players.push(newPlayer);

    // Save players data to local storage
    localStorage.setItem("players", JSON.stringify(players));

    // Refresh the leaderboard
    displayLeaderboard();

    // Reset the form inputs
    document.getElementById("playerName").value = "";
    document.getElementById("mmr").value = "";
    document.getElementById("wins").value = "";
    document.getElementById("losses").value = "";
});

// Delete player from the leaderboard
function deletePlayer(index) {
    players.splice(index, 1);

    // Save players data to the backend server (MySQL storage)
    savePlayersDataToMySQL(players);

    // Refresh the leaderboard
    displayLeaderboard();
}

// Save players data to MySQL storage using an API call
function savePlayersDataToMySQL(playersData) {
    // Make an HTTP request to your backend API endpoint to save data
    // You can use libraries like Axios or Fetch API for this purpose.
    fetch('/api/save-players', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                players: playersData
            }),
        })
        .then(response => {
            // Handle response if needed
        })
        .catch(error => {
            // Handle error if needed
        });
}

// Display the initial leaderboard
displayLeaderboard();