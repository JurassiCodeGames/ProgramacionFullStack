import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    // --- VARIABLES GLOBALES DE ESTADO ---
    let currentPlayer = 1; 
    let currentRound = 1;
    let turnCount = 0; 
    const totalPlayers = 5;
    const turnsPerRound = 6;
    let turnDirection = 1; // 1 para J1 -> J2 -> J3..., -1 para J1 -> J5 -> J4...

    let isDieRolled = false;
    let placementDieRule = null;
    let playerChoices = {}; 
    let playersPlacedCount = 0;
    

// Rutas de dinosaurios
const allDinoNames = ["T-Rex", "Triceratops", "Parasaurolophus walkeri", "Stegosaurus", "Parasaurolophus tubicen", "Brachiosaurus"];
const allDinoImages = [
    "/images/Dinosaurios/1.png",
    "/images/Dinosaurios/2.png",
    "/images/Dinosaurios/3.png",
    "/images/Dinosaurios/4.png",
    "/images/Dinosaurios/5.png",
    "/images/Dinosaurios//6.png"
];

// Función para obtener la ruta de la imagen según el ID del dino
const getDinoImagePath = (id) => allDinoImages[id - 1];

    // --- REGLAS DEL DADO Y ZONAS ---
    const dieFaces = [
        { name: "Casas", zone: "Bosque" },
        { name: "Puente", zone: "Llanura"},
        { name: "Cafetería (Izquierda)", zone: "Izquierda"},
        { name: "Baños (Derecha)", zone: "Derecha"},
        { name: "Recinto Vacío", zone: "Vacio"},
        { name: "Sin T-Rex", zone: "NoT-Rex"}
    ];
    
    // Referencias al DOM
    const scoreDisplays = {};
    for (let i = 1; i <= totalPlayers; i++) {
        scoreDisplays[i] = document.getElementById(`score-j${i}`);
    }
    const selectionDisplay = document.getElementById('current-selection');
    const roundDisplay = document.getElementById('ronda-display');
    const rollDieButton = document.getElementById('roll-die-btn');
    const dieResultDisplay = document.getElementById('die-result');
    const gameContainer = document.getElementById('game-container');
    
    // --- REFERENCIAS DE PANTALLA FINAL ---
    const gameWrapper = document.getElementById('game-container-wrapper');
    const endScreen = document.getElementById('end-screen');
    const finalScoresDiv = document.getElementById('final-scores');
    const restartButton = document.getElementById('restart-btn');


    // --- UTILIDADES DE TABLERO ---
    function getDinosInRecinto(recintoElement) {
        const dinos = [];
        recintoElement.querySelectorAll('.slot .dinosaur-icon').forEach(icon => {
            dinos.push(icon.getAttribute('data-dino'));
        });
        return dinos;
    }
    
    function getAllDinosOnBoard(player) {
        const dinos = {};
        const tablero = document.querySelector(`.tablero[data-player="${player}"]`);
        tablero.querySelectorAll('.dinosaur-icon').forEach(icon => {
            const name = icon.getAttribute('data-dino');
            dinos[name] = (dinos[name] || 0) + 1;
        });
        return dinos;
    }

    function getCoronaDinosByPlayer() {
        const coronaDinos = {};
        for (let p = 1; p <= totalPlayers; p++) {
             const tablero = document.querySelector(`.tablero[data-player="${p}"]`);
             const dinos = getDinosInRecinto(tablero.querySelector('[data-recinto-nombre="Corona"]'));
             coronaDinos[p] = {
                 dino: dinos.length > 0 ? dinos[0] : null, 
                 count: dinos.length
             };
        }
        return coronaDinos;
    }


    // --- FUNCIÓN DE INICIALIZACIÓN DE TABLERO ---
function generatePlayerArea(playerNum) {
    const area = document.createElement('div');
    area.classList.add('player-area', 'card', 'p-3', 'mb-4');
    area.setAttribute('data-player', playerNum);

    // CONTENEDOR DE MANO
    const hand = `
        <div class="dino-hand-container mb-3">
            <h3>Mano de ${playerNames[playerIds[playerNum - 1]]}</h3>
            <div class="d-flex flex-wrap gap-2" id="dino-buttons-${playerNum}"></div>
        </div>
    `;

    // TABLERO — Ahora generado como GRID Bootstrap
    const tablero = document.createElement('div');
    tablero.classList.add('tablero');
    tablero.setAttribute('data-player', playerNum);

    tablero.innerHTML = `
        <h2 class="text-center mb-3">Tablero de ${playerNames[playerIds[playerNum - 1]]}</h2>

        <div class="row g-3">

            <div class="col-md-3">
                <div class="card p-2 h-100 recinto" data-recinto-nombre="Igualdad" data-zona="Bosque">
                    <p class="text-center fw-bold">Fábrica de Semejanza<br><small>(Casas/Izquierda)</small></p>
                    <div class="slots-container d-flex flex-wrap gap-2">${'<div class="slot"></div>'.repeat(6)}</div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-2 h-100 recinto" data-recinto-nombre="Diferencia" data-zona="Llanura">
                    <p class="text-center fw-bold">Sector de Diferencia<br><small>(Puente/Derecha)</small></p>
                    <div class="slots-container d-flex flex-wrap gap-2">${'<div class="slot"></div>'.repeat(6)}</div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-2 h-100 recinto" data-recinto-nombre="Corona" data-zona="Bosque">
                    <p class="text-center fw-bold">Rey del Futuro<br><small>(Casas/Derecha)</small></p>
                    <div class="slots-container d-flex flex-wrap gap-2">${'<div class="slot"></div>'}</div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-2 h-100 recinto" data-recinto-nombre="3 Dinos" data-zona="Bosque">
                    <p class="text-center fw-bold">Trío Frondoso<br><small>(Casas/Izquierda)</small></p>
                    <div class="slots-container d-flex flex-wrap gap-2">${'<div class="slot"></div>'.repeat(3)}</div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-2 h-100 recinto" data-recinto-nombre="Pareja" data-zona="Llanura">
                    <p class="text-center fw-bold">Cúpula del Amor<br><small>(Puente/Izquierda)</small></p>
                    <div class="slots-container d-flex flex-wrap gap-2">${'<div class="slot"></div>'.repeat(2)}</div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-2 h-100 recinto" data-recinto-nombre="Solo" data-zona="Llanura">
                    <p class="text-center fw-bold">Estación Solitaria<br><small>(Puente/Derecha)</small></p>
                    <div class="slots-container d-flex flex-wrap gap-2">${'<div class="slot"></div>'}</div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-2 h-100 recinto recinto-agua" data-recinto-nombre="Agua" data-zona="Río">
                    <p class="text-center fw-bold">Río<br><small>(1 Punto/Dino)</small></p>
                    <div class="slots-container d-flex flex-wrap gap-2" id="agua-slots-container-${playerNum}">
                        <div class="slot"></div>
                    </div>
                </div>
            </div>

        </div>
    `;

    area.innerHTML = hand;
    area.appendChild(tablero);
    gameContainer.appendChild(area);
}

    
    function addSlotEventListeners() {
        document.querySelectorAll('.slot').forEach(slot => {
            slot.removeEventListener('click', handlePlacement);
            slot.addEventListener('click', handlePlacement);
        });
    }

    function createNewAguaSlot(player) {
        const aguaContainer = document.getElementById(`agua-slots-container-${player}`);
        const newSlot = document.createElement('div');
        newSlot.classList.add('slot');
        newSlot.addEventListener('click', handlePlacement);
        aguaContainer.appendChild(newSlot);
    }

    // --- LÓGICA DE TURNO Y RESTRICCIONES ---

    function getNextPlayer(current, direction) {
        let next = current + direction;
        if (next > totalPlayers) next = 1;
        else if (next < 1) next = totalPlayers;
        return next;
    }

    function isRecintoFull(recinto) {
        if (recinto.getAttribute('data-recinto-nombre') === 'Agua') return false; 
        
        const slotsContainer = recinto.querySelector('.slots-container');
        const totalSlots = slotsContainer.children.length;
        const occupiedSlots = recinto.querySelectorAll('.dinosaur-icon').length;

        return occupiedSlots >= totalSlots;
    }
    
    function updateTurnIndicator() {
        document.querySelectorAll('.player-area').forEach(area => {
            area.classList.remove('active-turn');
        });
        const activeArea = document.querySelector(`.player-area[data-player="${currentPlayer}"]`);
        if (activeArea) {
            activeArea.classList.add('active-turn');
        }

        const isCurrentPlayerLanzador = parseInt(activeArea?.getAttribute('data-player')) === currentPlayer;
        
        rollDieButton.disabled = isDieRolled || (currentRound > 2) || !isCurrentPlayerLanzador;

        document.querySelectorAll('.select-dino-btn').forEach(btn => {
            const player = parseInt(btn.closest('.player-area').getAttribute('data-player'));
            
            if (!isDieRolled || currentRound > 2 || playerChoices[player] === 'PLACED') {
                btn.disabled = true;
                return;
            }

            if (playerChoices[player] && playerChoices[player] !== 'PLACED') {
                 btn.disabled = !btn.classList.contains('selected');
            } else {
                 btn.disabled = false; 
            }
        });

        if (currentRound > 2) {
             selectionDisplay.innerHTML = "Juego Terminado. Revisa las puntuaciones.";
        } else if (!isDieRolled) {
            selectionDisplay.innerHTML = `Turno de <b>${playerNames[playerIds[currentPlayer - 1]]}</b>. ¡Lanza el dado para empezar!`;
        } else {
            selectionDisplay.innerHTML = `Regla - Recinto: <b>${placementDieRule.name}</b>. Dinosaurios colocados: ${playersPlacedCount}/${totalPlayers}.`;
        }
    }
    
    function rollDie() {
        if (isDieRolled || rollDieButton.disabled) return; 

        const randomIndex = Math.floor(Math.random() * dieFaces.length);
        placementDieRule = dieFaces[randomIndex];
        isDieRolled = true;
        dieResultDisplay.innerHTML = `A <b>${playerNames[playerIds[currentPlayer - 1]]}</b> (lanzador) no le afecta.`;

        playerChoices = {};
        playersPlacedCount = 0;
        
        for (let i = 1; i <= totalPlayers; i++) {
             playerChoices[i] = null;
        }

        updateTurnIndicator();
    }
    
    function selectDino() {
        if (!isDieRolled) return;

        const player = parseInt(this.closest('.player-area').getAttribute('data-player'));
        
        if (playerChoices[player] === 'PLACED') return; 

        const handContainer = document.getElementById(`dino-buttons-${player}`);
        handContainer.querySelectorAll('.select-dino-btn').forEach(btn => btn.classList.remove('selected'));
        
        this.classList.add('selected');
        playerChoices[player] = {
            dinoName: this.getAttribute('data-dino'),
            dinoId: this.getAttribute('data-dino-id'),
            buttonElement: this
        };

        updateTurnIndicator(); 
    }
    
    function clearPlayerSelection(player) {
        if (playerChoices[player] && playerChoices[player].buttonElement) {
            playerChoices[player].buttonElement.classList.remove('selected');
        }
        playerChoices[player] = null;
    }

    const handlePlacement = (e) => {
        const slot = e.currentTarget;
        const recinto = slot.closest('.recinto');
        const recintoNombre = recinto.getAttribute('data-recinto-nombre');
        const recintoZona = recinto.getAttribute('data-zona');
        const tablero = slot.closest('.tablero');
        const player = parseInt(tablero.getAttribute('data-player'));
        
        if (!isDieRolled) { alert('Espera a que el jugador activo lance el dado.'); return; }
        if (playerChoices[player] === 'PLACED') { 
            alert(`${playerNames[playerIds[currentPlayer - 1]]}, ¡ya has colocado tu dinosaurio en este turno!`); 
            return; 
        }
        if (!playerChoices[player]) { 
            alert(`${playerNames[playerIds[currentPlayer - 1]]}, ¡selecciona primero un Dino de tu mano!`); 
            return; 
        }

        const { dinoName, dinoId, buttonElement } = playerChoices[player];

        if (slot.children.length > 0) { alert('¡Ese espacio ya está ocupado!'); return; }
        if (isRecintoFull(recinto)) { alert(`¡El recinto "${recintoNombre}" está lleno!`); return; }
        
        let placementValid = true;
        let alertMessage = '';
        const dinosActuales = getDinosInRecinto(recinto);

        const lanzador = currentPlayer; 

        // --- VALIDACIÓN DEL DADO ---
        if (player !== lanzador && recintoNombre !== 'Agua') {
            let ruleEnforced = false;
            const targetZone = placementDieRule.zone;
            
            if (targetZone === 'Bosque' || targetZone === 'Izquierda') {
                if (recintoZona === 'Bosque') ruleEnforced = true;
            } else if (targetZone === 'Llanura' || targetZone === 'Derecha') {
                if (recintoZona === 'Llanura') ruleEnforced = true;
            } else if (targetZone === 'Vacio') {
                if (dinosActuales.length === 0) ruleEnforced = true;
            } else if (targetZone === 'NoT-Rex') {
                if (!dinosActuales.includes('T-Rex')) ruleEnforced = true;
            }

            if (!ruleEnforced) {
                placementValid = false;
                alertMessage = `¡Error de Dado! El dado (${placementDieRule.name}) te obliga a colocar en una zona válida O en el Río.`;
            }
        }
        
        // --- VALIDACIONES ESPECÍFICAS DE RECINTO ---
        if (placementValid) {
            if (recintoNombre === 'Igualdad' && dinosActuales.length > 0) {
                if (dinosActuales[0] !== dinoName) {
                    placementValid = false;
                    alertMessage = `¡Error de Igualdad! Solo puedes colocar dinosaurios de la especie **${dinosActuales[0]}**.`;
                }
            }
            if (recintoNombre === 'Diferencia') {
                if (dinosActuales.includes(dinoName)) {
                    placementValid = false;
                    alertMessage = `¡Error de Diferencia! No puedes colocar dos dinosaurios de la misma especie (${dinoName}).`;
                }
            }
            
            if (recintoNombre === 'Pareja' && dinosActuales.length > 0) {
                if (dinosActuales.length === 1 && dinosActuales[0] !== dinoName) {
                     placementValid = false;
                     alertMessage = `¡Error de Pareja! El segundo dinosaurio debe ser de la misma especie que el primero (${dinosActuales[0]}).`;
                }
            }
        }
        
        // 5. COLOCACIÓN Y AVANCE
        if (placementValid) {
            const dinoIcon = document.createElement('div');
            dinoIcon.classList.add('dinosaur-icon');
            dinoIcon.setAttribute('data-dino', dinoName);
            dinoIcon.setAttribute('data-dino-id', dinoId); 
            dinoIcon.innerHTML = `<img src="${getDinoImagePath(dinoId)}" alt="${dinoName}" style="width:50px; height:50px;">`;
            slot.appendChild(dinoIcon);

            if (recintoNombre === 'Agua') {
                createNewAguaSlot(player);
            }

            buttonElement.remove(); 
            playerChoices[player] = 'PLACED'; 
            playersPlacedCount++;
            
            updateTurnIndicator();

            if (playersPlacedCount === totalPlayers) {
                endTurn();
            }
        } else {
            alert(alertMessage);
            clearPlayerSelection(player); 
            updateTurnIndicator();
        }
    };

    function dealDinos() {
        for (let p = 1; p <= totalPlayers; p++) {
            const handContainer = document.getElementById(`dino-buttons-${p}`);
            handContainer.innerHTML = '';
            
            for (let i = 0; i < turnsPerRound - turnCount; i++) { 
                const randomId = Math.floor(Math.random() * 6) + 1;
                const randomName = allDinoNames[randomId - 1];

                const button = document.createElement('button');
                button.classList.add('select-dino-btn');
                button.setAttribute('data-dino', randomName);
                button.setAttribute('data-dino-id', randomId.toString());
                button.innerHTML = `<img src="${getDinoImagePath(randomId)}" alt="${randomName}" style="width: 20px; height: 20px;"> ${randomName}`;
                button.addEventListener('click', selectDino);
                
                handContainer.appendChild(button);
            }
        }
    }

    function passHands() {
        const handsToPass = {}; 
        
        for (let p = 1; p <= totalPlayers; p++) {
            const handContainer = document.getElementById(`dino-buttons-${p}`);
            handsToPass[p] = Array.from(handContainer.children);
            handsToPass[p].forEach(btn => btn.classList.remove('selected'));
        }

        for (let p = 1; p <= totalPlayers; p++) {
            const targetPlayer = getNextPlayer(p, turnDirection); 
            const targetContainer = document.getElementById(`dino-buttons-${targetPlayer}`);
            
            targetContainer.innerHTML = ''; 

            handsToPass[p].forEach(button => {
                targetContainer.appendChild(button);
            });
        }
    }

    function endGame(finalResults) {
        // 1. Ocultar juego y mostrar pantalla final
        if (gameWrapper && endScreen) {
             gameWrapper.classList.add('hidden');
             endScreen.classList.remove('hidden');
        } else {
             alert(`¡Juego Terminado! Revisa las puntuaciones en el marcador.`);
        }
        rollDieButton.disabled = true;
        document.querySelectorAll('.tablero, .player-area').forEach(el => el.style.pointerEvents = 'none');
        
        // 2. ORDENAR Y MOSTRAR RESULTADOS
        finalScoresDiv.innerHTML = '<h3> Puntuaciones Finales </h3>';
        
        // Ordenar los jugadores por puntuación de mayor a menor (descendente: b.score - a.score)
        finalResults.sort((a, b) => b.score - a.score);

    finalResults.forEach((data, index) => {
        const position = index + 1;
        let rankEmoji = '';
        if (position === 1) rankEmoji = '🥇';
        else if (position === 2) rankEmoji = '🥈';
        else if (position === 3) rankEmoji = '🥉';

        const playerId = playerIds[data.player - 1]; // ID real desde la base
        const playerName = playerNames[playerId];    // Nombre real

        const scoreLine = document.createElement('p');
        scoreLine.innerHTML = `${rankEmoji} ${position}º. ${playerName}: ${data.score} puntos`;
        finalScoresDiv.appendChild(scoreLine);
    });
}

    function sendFinalScoresToServer(playersData) {
    const scores = playersData.map(p => ({
        player_id: playerIds[p.player - 1],
        score: p.score
    }));

    fetch(`/partidas/{{ $partida->id }}/finalizar`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ scores })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) console.log('Puntuaciones guardadas en el servidor.');
    })
    .catch(err => console.error('Error al guardar puntuaciones:', err));
}

    function endTurn() {
        turnCount++;
        isDieRolled = false;
        dieResultDisplay.innerHTML = 'Esperando nuevo lanzamiento...';
        
        if (turnCount === turnsPerRound) {
            calculateAndDisplayScore(false); // Puntuación al final de la ronda
            currentRound++;
            roundDisplay.textContent = currentRound;
            
            if (currentRound > 2) {
                const finalResults = calculateAndDisplayScore(true); // CÁLCULO FINAL
                endGame(finalResults); 
                return;
            }

            turnDirection *= -1; 
            turnCount = 0; 
            
            alert(`¡Ronda ${currentRound - 1} terminada! Comienza la Ronda ${currentRound}. Dirección de draft invertida.`);
            dealDinos(); 
            currentPlayer = getNextPlayer(currentPlayer, turnDirection); 
            
        } else {
            passHands();
            currentPlayer = getNextPlayer(currentPlayer, turnDirection); 
        }
        
        playersPlacedCount = 0;
        playerChoices = {};
        saveGameState(); 
        updateTurnIndicator();
    }

    function saveGameState() {
    const state = {
        currentPlayer,
        currentRound,
        turnCount,
        turnDirection,
        tableros: []
    };

    document.querySelectorAll('.tablero').forEach(tablero => {
        const player = tablero.dataset.player;
        const dinos = Array.from(tablero.querySelectorAll('.slot')).map(slot => slot.dataset.dino || null);
        state.tableros.push({ player, dinos });
    });

    localStorage.setItem('draftosaurusState', JSON.stringify(state));
}

    // --- LÓGICA DE PUNTUACIÓN CORREGIDA ---
    function calculateAndDisplayScore(isFinal) {
        
        const playersData = [];
        for (let p = 1; p <= totalPlayers; p++) {
             playersData.push({
                 player: p,
                 tablero: document.querySelector(`.tablero[data-player="${p}"]`),
                 dinosBySpecies: getAllDinosOnBoard(p),
                 score: 0 
             });
        }
        
        // 2. Determinar quién gana el Recinto Corona (Rey de la Selva)
        const allCoronaDinos = getCoronaDinosByPlayer();
        const coronaWinners = {}; 
        let maxCoronaCount = 0;
        let winningDino = null;

        for (const player in allCoronaDinos) {
            const data = allCoronaDinos[player];
            if (data.dino && data.count > 0) {
                 if (data.count > maxCoronaCount) {
                     maxCoronaCount = data.count;
                     winningDino = data.dino;
                 }
            }
        }
        if (winningDino) {
             let maxDinoCount = 0;
             playersData.forEach(data => {
                 const currentDinoCount = data.dinosBySpecies[winningDino] || 0;
                 if (currentDinoCount > maxDinoCount) {
                     maxDinoCount = currentDinoCount;
                 }
             });
             playersData.forEach(data => {
                  if ((data.dinosBySpecies[winningDino] || 0) === maxDinoCount && maxDinoCount > 0) {
                      coronaWinners[data.player] = true;
                  }
             });
        }
        
        
        // 3. Calcular la puntuación individual
        playersData.forEach(data => {
            let totalScore = 0;
            const tablero = data.tablero;
            let tRexBonusPoints = 0; // 1 punto por recinto principal con T-Rex
            
            tablero.querySelectorAll('.recinto').forEach(recinto => {
                const nombre = recinto.getAttribute('data-recinto-nombre');
                const dinos = getDinosInRecinto(recinto);
                const count = dinos.length;
                let recintoScore = 0;
                
                if (count === 0) return;

                // Sumar la bonificación de T-Rex por dinosaurio individual
                const tRexCountInRecinto = dinos.filter(d => d === 'T-Rex').length;
                tRexBonusPoints += tRexCountInRecinto;

                switch (nombre) {
                    case 'Igualdad':
                        // 2, 4, 8, 12, 18, 24
                        if (count === 1) recintoScore = 2;
                        else if (count === 2) recintoScore = 4;
                        else if (count === 3) recintoScore = 8;
                        else if (count === 4) recintoScore = 12;
                        else if (count === 5) recintoScore = 18;
                        else if (count >= 6) recintoScore = 24; 
                        break;
                    case 'Diferencia':
                        // 1, 3, 6, 10, 15, 21
                        if (count === 1) recintoScore = 1;
                        else if (count === 2) recintoScore = 3;
                        else if (count === 3) recintoScore = 6;
                        else if (count === 4) recintoScore = 10;
                        else if (count === 5) recintoScore = 15;
                        else if (count >= 6) recintoScore = 21; 
                        break;
                    case 'Corona':
                        // Rey de la Selva: 7 puntos si es el ganador de mayoría
                        if (isFinal && coronaWinners[data.player]) {
                             recintoScore = 7; 
                        } else if (!isFinal && count > 0) {
                            recintoScore = count;
                        }
                        break;
                    case '3 Dinos':
                        // Trío Frondoso: 6 puntos si tiene exactamente 3
                        if (count === 3) recintoScore = 7;
                        break;
                    case 'Pareja':
                        if (count === 2) recintoScore = 5;
                        break;
                    case 'Solo':
                        // Isla Solitaria: 7 puntos si es único en todo el tablero
                        const soloDinoName = dinos[0];
                        if (data.dinosBySpecies[soloDinoName] === 1) {
                             recintoScore = 7;
                        } else {
                             recintoScore = 1; // 1 punto si no es único
                        }
                        break;
                    case 'Agua':
                        recintoScore = count;
                        break;
                }
                totalScore += recintoScore;
            });
            
            // Sumar la bonificación total de T-Rex por recintos
            totalScore += tRexBonusPoints;
            
            data.score = totalScore;
            
            // Actualizar la interfaz del marcador
            scoreDisplays[data.player].textContent = totalScore; 
        });
        
        return playersData; 
    }


    // --- INICIALIZACIÓN ---
    function initGame() {
        // Reiniciar estado
        if (gameWrapper && endScreen) {
            gameWrapper.classList.remove('hidden');
            endScreen.classList.add('hidden');
        }
        gameContainer.innerHTML = '';
        if(finalScoresDiv) finalScoresDiv.innerHTML = ''; // Limpiar resultados anteriores

        // Generar tableros
        for (let p = 1; p <= totalPlayers; p++) {
            generatePlayerArea(p);
        }
        
        // Asegurar el slot inicial en el río
        for (let p = 1; p <= totalPlayers; p++) {
            const aguaContainer = document.getElementById(`agua-slots-container-${p}`);
            if (aguaContainer) {
                const initialSlot = document.createElement('div');
                initialSlot.classList.add('slot');
                initialSlot.addEventListener('click', handlePlacement); 
                aguaContainer.appendChild(initialSlot);
            }
        }
        
        addSlotEventListeners(); 
        dealDinos();
        
        currentPlayer = 1; 
        currentRound = 1;
        turnCount = 0;
        turnDirection = 1; 
        isDieRolled = false;
        
        // Configurar UI inicial
        updateTurnIndicator();
        calculateAndDisplayScore(false);
        roundDisplay.textContent = currentRound;
        dieResultDisplay.innerHTML = `${playerNames[playerIds[currentPlayer - 1]]} debe lanzar el dado.`;
    }
    
    // Listeners principales
    rollDieButton.addEventListener('click', rollDie);
    // Recargar la página para reiniciar el juego
    if (restartButton) restartButton.addEventListener('click', () => window.location.reload()); 


    // --- BOTÓN FINALIZAR PARTIDA MANUALMENTE ---
    const endGameButton = document.getElementById('end-game-btn');

        if (endGameButton) {
            endGameButton.addEventListener('click', () => {
        if (confirm("¿Seguro que querés finalizar la partida? No se podrá seguir jugando ni editar nada.")) {
            const finalResults = calculateAndDisplayScore(true);
            endGame(finalResults);

            // Bloquear todo para que no se pueda seguir editando
            document.querySelectorAll('button, .slot').forEach(el => el.disabled = true);
            document.querySelectorAll('.tablero, .player-area').forEach(el => el.style.pointerEvents = 'none');

            endGameButton.disabled = true; // desactivar el propio botón

            // --- Guardar estado y puntuaciones en servidor ---
            const scores = finalResults.map(p => ({
                player_id: playerIds[p.player - 1],
                score: p.score
            }));

            fetch(`/partidas/{{ $partida->id }}/finalizar`, {
            method: 'POST',
            headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    
    body: JSON.stringify({ scores })
})

            .then(res => res.json())
            .then(data => {
                if(data.success){
                    alert('Partida finalizada y puntuaciones guardadas.');
                } else {
                    alert('Error al finalizar la partida.');
                }
            })
            .catch(err => console.error('Error:', err));
        }
    });
}

    // Iniciar el juego al cargar la página
    initGame();
});

window.googleTranslateElementInit = function () {
  new google.translate.TranslateElement({
    pageLanguage: 'es',
    includedLanguages: 'en',
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
  }, 'google_translate_element');
};