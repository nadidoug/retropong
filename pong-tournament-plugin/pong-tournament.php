<?php
/**
 * Plugin Name: Pong Tournament
 * Description: Displays a Pong tournament landing page, signup form, score submission form, and live leaderboard pulled from GitHub Pages.
 * Version: 1.0.0
 * Author: Nadidoug
 */

if (!defined('ABSPATH')) {
    exit;
}

function pong_tournament_assets() {
    wp_enqueue_style(
        'pong-tournament-style',
        plugin_dir_url(__FILE__) . 'assets/tournament.css',
        array(),
        '1.0.0'
    );

    wp_enqueue_script(
        'pong-tournament-script',
        plugin_dir_url(__FILE__) . 'assets/tournament.js',
        array(),
        '1.0.0',
        true
    );

    wp_localize_script('pong-tournament-script', 'PongTournamentSettings', array(
        'leaderboardUrl' => 'https://nadidoug.github.io/retropong/leaderboard.json',
        'gameUrl' => 'https://nadidoug.github.io/retropong/',
        'issueUrl' => 'https://github.com/nadidoug/retropong/issues/new'
    ));
}
add_action('wp_enqueue_scripts', 'pong_tournament_assets');

function pong_tournament_shortcode() {
    ob_start();
    ?>
    <div class="pong-tournament-page">
        <header class="pong-hero">
            <div class="pong-hero-inner">
                <div class="pong-tagline">Long-Running Skill Challenge</div>
                <h1>Pong Tournament</h1>
                <p>
                    Sign up, play, post your score, climb the leaderboard, and compete over time.
                    This is a public competition page for players who want bragging rights and ranking.
                </p>
                <div class="pong-buttons">
                    <a href="#signup" class="pong-button">Sign Up</a>
                    <a href="https://nadidoug.github.io/retropong/" class="pong-button pong-secondary" target="_blank" rel="noopener">Play Game</a>
                    <a href="#leaderboard" class="pong-button pong-secondary">View Leaderboard</a>
                </div>
            </div>
        </header>

        <section id="rules" class="pong-section">
            <h2>How It Works</h2>
            <div class="pong-grid">
                <div class="pong-card">
                    <h3>1. Sign Up</h3>
                    <p>Enter your name, phone, and player display name. Phone and email stay private.</p>
                </div>
                <div class="pong-card">
                    <h3>2. Play Pong</h3>
                    <p>Play the official GitHub Pages game version and record your score.</p>
                </div>
                <div class="pong-card">
                    <h3>3. Submit Score</h3>
                    <p>Submit your score as a GitHub Issue for review and leaderboard placement.</p>
                </div>
                <div class="pong-card">
                    <h3>4. Climb Rankings</h3>
                    <p>The highest approved scores stay visible on the public tournament board.</p>
                </div>
            </div>
        </section>

        <section id="signup" class="pong-section">
            <h2>Player Sign Up</h2>
            <form class="pong-form" id="pongSignupForm">
                <input type="text" name="fullName" placeholder="Full Name" required />
                <input type="text" name="leaderboardName" placeholder="Leaderboard Name" required />
                <input type="tel" name="phone" placeholder="Phone Number" required />
                <input type="email" name="email" placeholder="Email Address" />
                <select name="division" required>
                    <option value="">Choose Division</option>
                    <option>Beginner</option>
                    <option>Regular Player</option>
                    <option>Competitive</option>
                </select>
                <textarea name="notes" placeholder="Anything we should know?"></textarea>
                <button type="submit">Join Tournament</button>
                <p class="pong-status" id="pongSignupStatus"></p>
            </form>
        </section>

        <section id="submit-score" class="pong-section">
            <h2>Submit Score</h2>
            <form class="pong-form" id="pongScoreForm">
                <input type="text" name="leaderboardName" placeholder="Leaderboard Name" required />
                <input type="number" name="score" placeholder="Your Score" required />
                <input type="number" name="wins" placeholder="Wins" value="0" min="0" />
                <input type="number" name="losses" placeholder="Losses" value="0" min="0" />
                <input type="text" name="division" placeholder="Division" />
                <textarea name="proof" placeholder="Optional proof, notes, or screenshot link"></textarea>
                <button type="submit">Submit Score</button>
                <p class="pong-status" id="pongScoreStatus"></p>
            </form>
        </section>

        <section id="leaderboard" class="pong-section">
            <h2>Leaderboard</h2>
            <div class="pong-table-wrap">
                <table class="pong-table">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Player</th>
                            <th>Score</th>
                            <th>Wins</th>
                            <th>Losses</th>
                            <th>Approved</th>
                        </tr>
                    </thead>
                    <tbody id="pongLeaderboardBody">
                        <tr>
                            <td colspan="6">Loading approved scores...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="pong-section">
            <h2>Rules</h2>
            <p>
                Scores must come from the official Pong game. Fake scores, duplicate entries,
                or suspicious submissions can be removed. The organizer can update rankings,
                review entries, and reset rounds when needed.
            </p>
        </section>

        <footer class="pong-footer">
            Pong Tournament © 2026
        </footer>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('pong_tournament', 'pong_tournament_shortcode');
