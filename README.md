# Retro Glow Pong

A single-file HTML5 Canvas Pong game with glow visuals, mobile paddle control, sound effects, score submission, and a public leaderboard file.

## Important: GitHub Pages Setup

The game file is:

`index.html`

The leaderboard file is:

`leaderboard.json`

The live GitHub Pages link should be:

https://nadidoug.github.io/retropong/

If that link gives a 404, GitHub Pages is not currently publishing this repository from the expected source. Go to:

`Settings → Pages`

Then set:

- Source: `Deploy from a branch`
- Branch: `main`
- Folder: `/root`

After saving, wait for the Pages deployment to finish.

## Cache-Busting Test Link

After Pages is enabled, open:

https://nadidoug.github.io/retropong/?v=leaderboard-sound-main

## Current Features

- Full-screen HTML5 Canvas Pong
- iPhone landscape prompt
- Player paddle
- CPU paddle
- Paddle hit sound
- Score sound
- Visible sound toggle button
- Public leaderboard panel
- Score submission form
- GitHub Issue score inbox
- `leaderboard.json` for approved scores

## iPhone Sound

Tap the top-left button:

`🔊 Sound Off`

It should change to:

`🔊 Sound On`

You should hear two confirmation beeps.

## Controls

- Desktop: move the mouse vertically.
- Mobile: drag a finger vertically.

## Files

- `index.html` — complete playable game, including CSS and JavaScript.
- `leaderboard.json` — public leaderboard data.

## Status Note

If GitHub shows code changes but the live link still shows the old game or returns 404, the issue is the GitHub Pages publishing source, not the game code.