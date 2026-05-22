<?php
/**
 * Plugin Name: Pong Tournament
 * Description: Displays a one-page Pong tournament hub with signup, live leaderboard, play timer popup, and GitHub Issue score submissions.
 * Version: 1.1.0
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
        '1.1.0'
    );

    wp_enqueue_script(
        'pong-tournament-script',
        plugin_dir_url(__FILE__) . 'assets/tournament.js',
        array(),
        '1.1.0',
        true
    );

    wp_localize_script('pong-tournament-script', 'PongTournamentSettings', array(
        'leaderboardUrl' => 'https://nadidoug.github.io/retropong/leaderboard.json',
        'gameUrl' => 'https://nadidoug.github.io/retropong/',
        'issueUrl' => 'https://github.com/nadidoug/retropong/issues/new',
        'playSeconds' => 120,
        'refreshSeconds' => 20
    ));
}
add_action('wp_enqueue_scripts', 'pong_tournament_assets');

function pong_tournament_shortcode() {
    ob_start();
    ?>
    <div class="pong-tournament-page">
        <header class="pong-hero">
            <div class="pong-hero-inner">
                <div class="pong-tagline">2-Minute Skill Challenge</div>
                <h1>Pong Tournament</h1>
                <p>
                    Sign up, play the official Pong game, submit your score, and watch the live leaderboard update as approved scores come in.
                </p>
                <div class="pong-buttons">
                    <a href="#signup" class="pong-button">Sign Up</a>
                    <a href="https://nadidoug.github.io/retropong/" class="pong-button pong-play-button" id="pongPlayButton" target="_blank" rel="noopener">Play Game</a>
                    <a href="#submit-score" class="pong-button pong-secondary">Submit Score</a>
                </div>
            </div>
        </header>

        <section id="leaderboard" class="pong-section pong-front-leaderboard">
            <div class="pong-section-title-row">
                <div>
                    <h2>Live Leaderboard</h2>
                    <p>Approved scores refresh automatically. Phone numbers and emails are never displayed.</p>
                </div>
                <button type="button" class="pong-small-button" id="pongRefreshLeaderboard">Refresh</button>
            </div>
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
            <p class="pong-status" id="pongLeaderboardStatus">Leaderboard refreshes automatically.</p>
        </section>

        <section id="rules" class="pong-section">
            <h2>How It Works</h2>
            <div class="pong-grid">
                <div class="pong-card"><h3>1. Sign Up</h3><p>Enter your name, phone, and public leaderboard name.</p></div>
                <div class="pong-card"><h3>2. Play 2 Minutes</h3><p>Click Play Game. This tournament page starts a 2-minute reminder timer.</p></div>
                <div class="pong-card"><h3>3. Submit Score</h3><p>When the timer ends, a pop-up tells you to submit your score.</p></div>
                <div class="pong-card"><h3>4. Get Approved</h3><p>Approved GitHub Issue scores appear on the live leaderboard.</p></div>
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

        <section class="pong-section">
            <h2>Rules</h2>
            <p>
                Scores must come from the official Pong game. Fake scores, duplicate entries,
                or suspicious submissions can be removed. The organizer can update rankings,
                review entries, and reset rounds when needed.
            </p>
        </section>

        <div class="pong-modal" id="pongPlayModal" aria-hidden="true">
            <div class="pong-modal-card">
                <h2>2 Minutes Are Up</h2>
                <p>Time to submit your Pong score. Enter your leaderboard name and score so it can be reviewed.</p>
                <div class="pong-buttons">
                    <a href="#submit-score" class="pong-button" id="pongGoSubmit">Submit Score</a>
                    <button type="button" class="pong-button pong-secondary" id="pongCloseModal">Close</button>
                </div>
            </div>
        </div>

        <footer class="pong-footer">Pong Tournament © 2026</footer>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('pong_tournament', 'pong_tournament_shortcode');
