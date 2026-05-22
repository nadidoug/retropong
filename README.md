# Retro Glow Pong

A single-file HTML5 Canvas Pong prototype with a black OLED background, glassy neon glow, touch-friendly paddle control, and a CPU opponent that gets harder as rallies build.

## Play On iPhone

Open this link on your iPhone:

[Play Retro Glow Pong](https://nadidoug.github.io/retropong/)

If you are using iPhone Safari or iPhone Chrome, the game will ask you to rotate into landscape before play.

## Play

Open `index.html` in a browser.

For local testing with a tiny static server:

```bash
npx serve .
```

Then open the local URL shown in the terminal.

## Controls

- Desktop: move the mouse vertically to control the left paddle.
- Mobile: drag a finger vertically to control the left paddle.

## Current Features

- Full-screen HTML5 Canvas
- iPhone landscape play with portrait rotation prompt
- Player paddle
- CPU paddle
- Glowing ball physics
- Paddle and wall collision
- Scoreboard
- Reset after score
- Rally-based ball speed increase
- Width-relative ball timing for wide iPhone landscape screens
- CPU difficulty rises with score and rally length

## Files

- `index.html`: complete playable game, including CSS and JavaScript
- `brand-kit/`: logos, palette, and simple share graphics
- `docs/TESTING.md`: quick smoke-test checklist

## Scope

This is intentionally a first playable prototype. It has no backend, accounts, store, leaderboard, menus, or external libraries.
