# Retro Glow Pong

A mobile-friendly HTML5 Canvas Pong game with an OLED-black background, neon visuals, progressive ball speed, and touch controls.

**Play live:** [nadidoug.github.io/retropong](https://nadidoug.github.io/retropong/)

## Gameplay

- Move the left paddle with a mouse or vertical touch gesture.
- Keep the ball in play against the CPU paddle.
- Build longer rallies as the ball accelerates.
- Track the score directly on the canvas.

## Built with

- HTML5
- CSS
- Vanilla JavaScript
- Canvas API
- GitHub Pages

## Run locally

No build step is required. Open `index.html` directly, or serve the repository with:

```bash
npm start
```

## Testing

The repository includes a manual browser and mobile smoke-test checklist in [docs/TESTING.md](docs/TESTING.md). The checklist covers canvas sizing, paddle controls, scoring, ball acceleration, mobile rotation, touch input, and console errors.

## Project files

- `index.html` — game interface and runtime.
- `leaderboard.json` — leaderboard data placeholder.
- `docs/TESTING.md` — browser and mobile test checklist.
- `brand-kit/` — visual identity assets.
- `pong-tournament-plugin/` — tournament-related extension work.

## Planned iteration

An Orb Reactor concept is in development with goalie survival, portrait and landscape play, score-over-time mechanics, multi-ball chaos waves, bounce objects, and power orbs.

Preview route: [Orb Reactor preview](https://nadidoug.github.io/retropong/?v=orb-reactor-preview)

## License

Released under the [MIT License](LICENSE).
