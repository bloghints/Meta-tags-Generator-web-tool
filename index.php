<?php
/**
 * Complete SEO & Social Media Meta Tag Generator By https://bloghints.com
 */

if (isset($_GET['download'])) {
    if ($_GET['download'] === 'readme' && file_exists(__DIR__ . '/README.md')) {
        $file = __DIR__ . '/README.md';
        $filename = 'README.md';
    } else {
        $file = __FILE__;
        $filename = 'index.php';
    }
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}

$defaults = [
    'title' => 'My Awesome Website — Best Digital Solutions',
    'description' => 'Discover high-quality digital services and products designed to help your business grow faster and more efficiently.',
    'keywords' => 'website, digital, seo, business, technology, web development',
    'author' => 'Your Name / Company',
    'canonical' => 'https://example.com/',
    'robots_index' => 'index',
    'robots_follow' => 'follow',
    'charset' => 'UTF-8',
    'viewport' => 'width=device-width, initial-scale=1.0',
    'language' => 'en',
    'revisit' => '',
    'theme_color' => '#2563eb',
    'og_type' => 'website',
    'og_site_name' => 'My Awesome Website',
    'og_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=80',
    'og_locale' => 'en_US',
    'twitter_card' => 'summary_large_image',
    'twitter_site' => '@username',
    'twitter_creator' => '@username',
];

$data = [];
foreach ($defaults as $key => $val) {
    $data[$key] = isset($_POST[$key]) ? trim((string)$_POST[$key]) : $val;
}

function e(string $str): string {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function generateMetaTags(array $d): string {
    $lines = [];
    $lines[] = "<!-- Primary Meta Tags -->";
    if ($d['charset'] !== '') {
        $lines[] = '<meta charset="' . e($d['charset']) . '">';
    }
    if ($d['viewport'] !== '') {
        $lines[] = '<meta name="viewport" content="' . e($d['viewport']) . '">';
    }
    if ($d['title'] !== '') {
        $lines[] = '<title>' . e($d['title']) . '</title>';
        $lines[] = '<meta name="title" content="' . e($d['title']) . '">';
    }
    if ($d['description'] !== '') {
        $lines[] = '<meta name="description" content="' . e($d['description']) . '">';
    }
    if ($d['keywords'] !== '') {
        $lines[] = '<meta name="keywords" content="' . e($d['keywords']) . '">';
    }
    if ($d['author'] !== '') {
        $lines[] = '<meta name="author" content="' . e($d['author']) . '">';
    }

    $robots = trim($d['robots_index'] . ', ' . $d['robots_follow'], ', ');
    if ($robots !== '') {
        $lines[] = '<meta name="robots" content="' . e($robots) . '">';
    }
    if ($d['language'] !== '') {
        $lines[] = '<meta http-equiv="Content-Language" content="' . e($d['language']) . '">';
    }
    if ($d['revisit'] !== '') {
        $lines[] = '<meta name="revisit-after" content="' . e($d['revisit']) . ' days">';
    }
    if ($d['theme_color'] !== '') {
        $lines[] = '<meta name="theme-color" content="' . e($d['theme_color']) . '">';
    }
    if ($d['canonical'] !== '') {
        $lines[] = '<link rel="canonical" href="' . e($d['canonical']) . '">';
    }

    // Open Graph / Facebook
    $lines[] = "";
    $lines[] = "<!-- Open Graph / Facebook -->";
    $lines[] = '<meta property="og:type" content="' . e($d['og_type'] ?: 'website') . '">';
    if ($d['canonical'] !== '') {
        $lines[] = '<meta property="og:url" content="' . e($d['canonical']) . '">';
    }
    if ($d['title'] !== '') {
        $lines[] = '<meta property="og:title" content="' . e($d['title']) . '">';
    }
    if ($d['description'] !== '') {
        $lines[] = '<meta property="og:description" content="' . e($d['description']) . '">';
    }
    if ($d['og_image'] !== '') {
        $lines[] = '<meta property="og:image" content="' . e($d['og_image']) . '">';
    }
    if ($d['og_site_name'] !== '') {
        $lines[] = '<meta property="og:site_name" content="' . e($d['og_site_name']) . '">';
    }
    if ($d['og_locale'] !== '') {
        $lines[] = '<meta property="og:locale" content="' . e($d['og_locale']) . '">';
    }

    // Twitter
    $lines[] = "";
    $lines[] = "<!-- Twitter -->";
    $lines[] = '<meta name="twitter:card" content="' . e($d['twitter_card'] ?: 'summary_large_image') . '">';
    if ($d['canonical'] !== '') {
        $lines[] = '<meta name="twitter:url" content="' . e($d['canonical']) . '">';
    }
    if ($d['title'] !== '') {
        $lines[] = '<meta name="twitter:title" content="' . e($d['title']) . '">';
    }
    if ($d['description'] !== '') {
        $lines[] = '<meta name="twitter:description" content="' . e($d['description']) . '">';
    }
    if ($d['og_image'] !== '') {
        $lines[] = '<meta name="twitter:image" content="' . e($d['og_image']) . '">';
    }
    if ($d['twitter_site'] !== '') {
        $lines[] = '<meta name="twitter:site" content="' . e($d['twitter_site']) . '">';
    }
    if ($d['twitter_creator'] !== '') {
        $lines[] = '<meta name="twitter:creator" content="' . e($d['twitter_creator']) . '">';
    }

    return implode("\n", $lines);
}

$generatedCode = generateMetaTags($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meta Tag Generator — Complete SEO & Social Media Tool</title>
    <style>
        :root {
            --bg: #f8fafc;
            --surface: #ffffff;
            --border: #e2e8f0;
            --text: #0f172a;
            --text-muted: #64748b;
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --code-bg: #0f172a;
            --code-text: #e2e8f0;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --radius: 10px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Inter, sans-serif;
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.5;
            padding-bottom: 3rem;
        }

        header {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 1.25rem 1.5rem;
            margin-bottom: 1.75rem;
        }

        .header-inner {
            max-width: 1240px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .brand h1 {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--text);
        }

        .brand p {
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        .badge {
            font-size: 0.75rem;
            font-weight: 600;
            background: #eff6ff;
            color: var(--primary);
            padding: 0.35rem 0.75rem;
            border-radius: 999px;
            border: 1px solid #bfdbfe;
        }

        .container {
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 1.75rem;
            align-items: start;
        }

        @media (max-width: 960px) {
            .container {
                grid-template-columns: 1fr;
            }
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
        }

        .card-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            padding-bottom: 0.65rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        @media (max-width: 600px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 0.35rem;
            color: #334155;
        }

        .counter {
            font-size: 0.75rem;
            font-weight: 500;
            color: var(--text-muted);
        }

        .counter.warn { color: var(--warning); }
        .counter.over { color: var(--danger); }

        input[type="text"],
        input[type="url"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 0.6rem 0.75rem;
            font-size: 0.9rem;
            font-family: inherit;
            color: var(--text);
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 7px;
            transition: border-color 0.15s, box-shadow 0.15s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        textarea {
            resize: vertical;
            min-height: 85px;
        }

        .color-row {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        input[type="color"] {
            width: 42px;
            height: 38px;
            border: 1px solid var(--border);
            border-radius: 7px;
            padding: 2px;
            background: #fff;
            cursor: pointer;
        }

        .hint {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-top: 0.25rem;
        }

        .btn-row {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            padding: 0.6rem 1.1rem;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 7px;
            border: 1px solid transparent;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
        }

        .btn-primary:hover {
            background: var(--primary-hover);
        }

        .btn-outline {
            background: #fff;
            border-color: var(--border);
            color: var(--text);
        }

        .btn-outline:hover {
            background: #f1f5f9;
        }

        /* Sticky Right Column */
        .sticky-col {
            position: sticky;
            top: 1.5rem;
        }

        /* Code Output */
        .code-wrapper {
            position: relative;
            background: var(--code-bg);
            color: var(--code-text);
            border-radius: 8px;
            padding: 1rem;
            overflow-x: auto;
            font-family: "JetBrains Mono", Consolas, Monaco, monospace;
            font-size: 0.8rem;
            line-height: 1.55;
            max-height: 400px;
        }

        pre {
            margin: 0;
            white-space: pre-wrap;
            word-break: break-word;
        }

        /* Google SERP Preview */
        .serp-preview {
            padding: 0.5rem 0;
            font-family: Arial, sans-serif;
        }

        .serp-url {
            font-size: 0.82rem;
            color: #202124;
            margin-bottom: 2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .serp-title {
            font-size: 1.15rem;
            color: #1a0dab;
            font-weight: 400;
            line-height: 1.3;
            margin-bottom: 4px;
            cursor: pointer;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .serp-title:hover {
            text-decoration: underline;
        }

        .serp-desc {
            font-size: 0.875rem;
            color: #4d5156;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Social Card Preview */
        .social-card {
            border: 1px solid var(--border);
            border-radius: 10px;
            overflow: hidden;
            background: #f8fafc;
        }

        .social-img-box {
            width: 100%;
            height: 190px;
            background: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        .social-img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .social-body {
            padding: 0.85rem 1rem;
            background: #fff;
            border-top: 1px solid var(--border);
        }

        .social-domain {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 0.2rem;
        }

        .social-title {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 0.25rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .social-desc {
            font-size: 0.82rem;
            color: var(--text-muted);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .toast {
            font-size: 0.8rem;
            color: var(--success);
            font-weight: 600;
            display: none;
        }
    </style>
</head>
<body>

<header>
    <div class="header-inner">
        <div class="brand">
            <h1>Meta Tag Generator</h1>
            <p>Instant SEO, Open Graph (Facebook/LinkedIn), and Twitter Card Meta Tag Generator</p>
        </div>
        <div style="display:flex; align-items:center; gap:0.6rem; flex-wrap:wrap;">
            <span class="badge">PHP + Live Preview</span>
            <a href="?download=index" class="btn btn-primary" style="text-decoration:none; padding: 0.4rem 0.85rem; font-size: 0.8rem;">⬇ Download index.php</a>
            <a href="?download=readme" class="btn btn-outline" style="text-decoration:none; padding: 0.4rem 0.85rem; font-size: 0.8rem;">⬇ Download README.md</a>
        </div>
    </div>
</header>

<main class="container">
    <!-- FORM SECTION -->
    <form method="POST" action="" id="metaForm">
        <!-- 1. Basic SEO -->
        <div class="card">
            <div class="card-title">
                <span>1. Basic Meta Tags (SEO)</span>
            </div>

            <div class="form-group">
                <label for="title">
                    <span>Site Title</span>
                    <span class="counter" id="titleCount">0 / 60</span>
                </label>
                <input type="text" id="title" name="title" value="<?= e($data['title']) ?>" placeholder="e.g., Artisan Coffee Roasters — Specialty Coffee Beans">
                <p class="hint">Recommended SEO length: 50–60 characters.</p>
            </div>

            <div class="form-group">
                <label for="description">
                    <span>Meta Description</span>
                    <span class="counter" id="descCount">0 / 160</span>
                </label>
                <textarea id="description" name="description" placeholder="Write a concise summary of your webpage content..."><?= e($data['description']) ?></textarea>
                <p class="hint">Recommended SEO length: 120–160 characters.</p>
            </div>

            <div class="form-group">
                <label for="keywords">Keywords</label>
                <input type="text" id="keywords" name="keywords" value="<?= e($data['keywords']) ?>" placeholder="coffee, arabica, espresso, roastery">
                <p class="hint">Separate each keyword with a comma (,).</p>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label for="canonical">Canonical URL</label>
                    <input type="url" id="canonical" name="canonical" value="<?= e($data['canonical']) ?>" placeholder="https://example.com/">
                </div>

                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" id="author" name="author" value="<?= e($data['author']) ?>" placeholder="Your Name / Company">
                </div>
            </div>
        </div>

        <!-- 2. Technical & Robots -->
        <div class="card">
            <div class="card-title">
                <span>2. Technical & Robots Directives</span>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label for="robots_index">Allow Search Indexing?</label>
                    <select id="robots_index" name="robots_index">
                        <option value="index" <?= $data['robots_index'] === 'index' ? 'selected' : '' ?>>Yes (index)</option>
                        <option value="noindex" <?= $data['robots_index'] === 'noindex' ? 'selected' : '' ?>>No (noindex)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="robots_follow">Allow Following Links?</label>
                    <select id="robots_follow" name="robots_follow">
                        <option value="follow" <?= $data['robots_follow'] === 'follow' ? 'selected' : '' ?>>Yes (follow)</option>
                        <option value="nofollow" <?= $data['robots_follow'] === 'nofollow' ? 'selected' : '' ?>>No (nofollow)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="charset">Character Encoding (Charset)</label>
                    <select id="charset" name="charset">
                        <option value="UTF-8" <?= $data['charset'] === 'UTF-8' ? 'selected' : '' ?>>UTF-8 (Recommended)</option>
                        <option value="ISO-8859-1" <?= $data['charset'] === 'ISO-8859-1' ? 'selected' : '' ?>>ISO-8859-1</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="language">Primary Language</label>
                    <select id="language" name="language">
                        <option value="en" <?= $data['language'] === 'en' ? 'selected' : '' ?>>English (en)</option>
                        <option value="id" <?= $data['language'] === 'id' ? 'selected' : '' ?>>Indonesian (id)</option>
                        <option value="es" <?= $data['language'] === 'es' ? 'selected' : '' ?>>Spanish (es)</option>
                        <option value="fr" <?= $data['language'] === 'fr' ? 'selected' : '' ?>>French (fr)</option>
                        <option value="de" <?= $data['language'] === 'de' ? 'selected' : '' ?>>German (de)</option>
                        <option value="" <?= $data['language'] === '' ? 'selected' : '' ?>>Not Specified</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="revisit">Revisit After (Optional)</label>
                    <input type="number" id="revisit" name="revisit" min="1" max="365" value="<?= e($data['revisit']) ?>" placeholder="Leave blank if not needed (days)">
                </div>

                <div class="form-group">
                    <label for="theme_color">Theme Color (Mobile Browser)</label>
                    <div class="color-row">
                        <input type="color" id="theme_color_picker" value="<?= e($data['theme_color'] ?: '#2563eb') ?>">
                        <input type="text" id="theme_color" name="theme_color" value="<?= e($data['theme_color']) ?>" placeholder="#2563eb">
                    </div>
                </div>

                <div class="form-group full">
                    <label for="viewport">Viewport</label>
                    <input type="text" id="viewport" name="viewport" value="<?= e($data['viewport']) ?>">
                </div>
            </div>
        </div>

        <!-- 3. Open Graph & Twitter -->
        <div class="card">
            <div class="card-title">
                <span>3. Open Graph (Facebook/LinkedIn) & Twitter Card</span>
            </div>

            <div class="form-group">
                <label for="og_image">Preview Image URL (OG / Twitter Image)</label>
                <input type="url" id="og_image" name="og_image" value="<?= e($data['og_image']) ?>" placeholder="https://example.com/banner.jpg">
                <p class="hint">Recommended dimensions: 1200 x 630 pixels.</p>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label for="og_type">Content Type (og:type)</label>
                    <select id="og_type" name="og_type">
                        <option value="website" <?= $data['og_type'] === 'website' ? 'selected' : '' ?>>Website</option>
                        <option value="article" <?= $data['og_type'] === 'article' ? 'selected' : '' ?>>Article</option>
                        <option value="product" <?= $data['og_type'] === 'product' ? 'selected' : '' ?>>Product</option>
                        <option value="profile" <?= $data['og_type'] === 'profile' ? 'selected' : '' ?>>Profile</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="og_site_name">Site Name (og:site_name)</label>
                    <input type="text" id="og_site_name" name="og_site_name" value="<?= e($data['og_site_name']) ?>" placeholder="My Awesome Website">
                </div>

                <div class="form-group">
                    <label for="og_locale">Locale (og:locale)</label>
                    <select id="og_locale" name="og_locale">
                        <option value="en_US" <?= $data['og_locale'] === 'en_US' ? 'selected' : '' ?>>en_US (English US)</option>
                        <option value="en_GB" <?= $data['og_locale'] === 'en_GB' ? 'selected' : '' ?>>en_GB (English UK)</option>
                        <option value="id_ID" <?= $data['og_locale'] === 'id_ID' ? 'selected' : '' ?>>id_ID (Indonesia)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="twitter_card">Twitter Card Type</label>
                    <select id="twitter_card" name="twitter_card">
                        <option value="summary_large_image" <?= $data['twitter_card'] === 'summary_large_image' ? 'selected' : '' ?>>Summary Large Image</option>
                        <option value="summary" <?= $data['twitter_card'] === 'summary' ? 'selected' : '' ?>>Summary</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="twitter_site">Twitter Site Account (@site)</label>
                    <input type="text" id="twitter_site" name="twitter_site" value="<?= e($data['twitter_site']) ?>" placeholder="@username">
                </div>

                <div class="form-group">
                    <label for="twitter_creator">Twitter Creator Account (@creator)</label>
                    <input type="text" id="twitter_creator" name="twitter_creator" value="<?= e($data['twitter_creator']) ?>" placeholder="@username">
                </div>
            </div>

            <div class="btn-row" style="margin-top: 0.75rem;">
                <button type="submit" class="btn btn-primary">Generate via PHP</button>
                <button type="button" class="btn btn-outline" id="resetBtn">Clear Fields</button>
            </div>
        </div>
    </form>

    <!-- PREVIEW & OUTPUT SECTION -->
    <div class="sticky-col">
        <!-- Generated HTML Code -->
        <div class="card">
            <div class="card-title">
                <span>Generated Meta Tags</span>
                <div style="display:flex; align-items:center; gap:0.6rem;">
                    <span class="toast" id="copyToast">Copied!</span>
                    <button type="button" class="btn btn-primary" id="copyBtn" style="padding: 0.35rem 0.75rem; font-size: 0.8rem;">
                        Copy Code
                    </button>
                </div>
            </div>
            <div class="code-wrapper">
                <pre><code id="codeOutput"><?= e($generatedCode) ?></code></pre>
            </div>
            <p class="hint" style="margin-top: 0.6rem;">Paste the code above inside the <code>&lt;head&gt;...&lt;/head&gt;</code> section of your HTML/PHP document.</p>
        </div>

        <!-- Google Search Preview -->
        <div class="card">
            <div class="card-title">
                <span>Google Search Engine Preview (SERP)</span>
            </div>
            <div class="serp-preview">
                <div class="serp-url" id="previewUrl"><?= e($data['canonical'] ?: 'https://example.com/') ?></div>
                <div class="serp-title" id="previewTitle"><?= e($data['title'] ?: 'Your Webpage Title Here') ?></div>
                <div class="serp-desc" id="previewDesc"><?= e($data['description'] ?: 'Your webpage meta description will appear here in Google search results.') ?></div>
            </div>
        </div>

        <!-- Social Media Card Preview -->
        <div class="card">
            <div class="card-title">
                <span>Social Share Preview (Facebook / LinkedIn / X)</span>
            </div>
            <div class="social-card">
                <div class="social-img-box" id="previewImgBox">
                    <?php if ($data['og_image'] !== ''): ?>
                        <img src="<?= e($data['og_image']) ?>" alt="Social Preview" id="previewImg" onerror="this.style.display='none'; this.parentElement.innerHTML='<span>Unable to load image</span>';">
                    <?php else: ?>
                        <span>No OG image provided</span>
                    <?php endif; ?>
                </div>
                <div class="social-body">
                    <div class="social-domain" id="previewDomain">EXAMPLE.COM</div>
                    <div class="social-title" id="previewSocialTitle"><?= e($data['title']) ?></div>
                    <div class="social-desc" id="previewSocialDesc"><?= e($data['description']) ?></div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
(function () {
    const form = document.getElementById('metaForm');
    const codeOutput = document.getElementById('codeOutput');
    const copyBtn = document.getElementById('copyBtn');
    const copyToast = document.getElementById('copyToast');
    const resetBtn = document.getElementById('resetBtn');

    const titleInput = document.getElementById('title');
    const descInput = document.getElementById('description');
    const titleCount = document.getElementById('titleCount');
    const descCount = document.getElementById('descCount');

    const colorPicker = document.getElementById('theme_color_picker');
    const colorText = document.getElementById('theme_color');

    const previewUrl = document.getElementById('previewUrl');
    const previewTitle = document.getElementById('previewTitle');
    const previewDesc = document.getElementById('previewDesc');
    const previewImgBox = document.getElementById('previewImgBox');
    const previewDomain = document.getElementById('previewDomain');
    const previewSocialTitle = document.getElementById('previewSocialTitle');
    const previewSocialDesc = document.getElementById('previewSocialDesc');

    function esc(str) {
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/"/g, '&quot;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');
    }

    function getVal(id) {
        const el = document.getElementById(id);
        return el ? el.value.trim() : '';
    }

    function updateCounter(input, counterEl, warnLimit, maxLimit) {
        const len = input.value.length;
        counterEl.textContent = len + ' / ' + maxLimit;
        counterEl.className = 'counter';
        if (len > maxLimit) {
            counterEl.classList.add('over');
        } else if (len >= warnLimit) {
            counterEl.classList.add('warn');
        }
    }

    function extractHost(urlStr) {
        try {
            const u = new URL(urlStr);
            return u.hostname.toUpperCase();
        } catch (e) {
            return 'EXAMPLE.COM';
        }
    }

    function updateAll() {
        updateCounter(titleInput, titleCount, 50, 60);
        updateCounter(descInput, descCount, 140, 160);

        const d = {
            title: getVal('title'),
            description: getVal('description'),
            keywords: getVal('keywords'),
            author: getVal('author'),
            canonical: getVal('canonical'),
            robots_index: getVal('robots_index'),
            robots_follow: getVal('robots_follow'),
            charset: getVal('charset'),
            viewport: getVal('viewport'),
            language: getVal('language'),
            revisit: getVal('revisit'),
            theme_color: getVal('theme_color'),
            og_type: getVal('og_type'),
            og_site_name: getVal('og_site_name'),
            og_image: getVal('og_image'),
            og_locale: getVal('og_locale'),
            twitter_card: getVal('twitter_card'),
            twitter_site: getVal('twitter_site'),
            twitter_creator: getVal('twitter_creator')
        };

        const lines = [];
        lines.push('<!-- Primary Meta Tags -->');
        if (d.charset) lines.push(`<meta charset="${esc(d.charset)}">`);
        if (d.viewport) lines.push(`<meta name="viewport" content="${esc(d.viewport)}">`);
        if (d.title) {
            lines.push(`<title>${esc(d.title)}</title>`);
            lines.push(`<meta name="title" content="${esc(d.title)}">`);
        }
        if (d.description) lines.push(`<meta name="description" content="${esc(d.description)}">`);
        if (d.keywords) lines.push(`<meta name="keywords" content="${esc(d.keywords)}">`);
        if (d.author) lines.push(`<meta name="author" content="${esc(d.author)}">`);

        const robots = [d.robots_index, d.robots_follow].filter(Boolean).join(', ');
        if (robots) lines.push(`<meta name="robots" content="${esc(robots)}">`);
        if (d.language) lines.push(`<meta http-equiv="Content-Language" content="${esc(d.language)}">`);
        if (d.revisit) lines.push(`<meta name="revisit-after" content="${esc(d.revisit)} days">`);
        if (d.theme_color) lines.push(`<meta name="theme-color" content="${esc(d.theme_color)}">`);
        if (d.canonical) lines.push(`<link rel="canonical" href="${esc(d.canonical)}">`);

        lines.push('');
        lines.push('<!-- Open Graph / Facebook -->');
        lines.push(`<meta property="og:type" content="${esc(d.og_type || 'website')}">`);
        if (d.canonical) lines.push(`<meta property="og:url" content="${esc(d.canonical)}">`);
        if (d.title) lines.push(`<meta property="og:title" content="${esc(d.title)}">`);
        if (d.description) lines.push(`<meta property="og:description" content="${esc(d.description)}">`);
        if (d.og_image) lines.push(`<meta property="og:image" content="${esc(d.og_image)}">`);
        if (d.og_site_name) lines.push(`<meta property="og:site_name" content="${esc(d.og_site_name)}">`);
        if (d.og_locale) lines.push(`<meta property="og:locale" content="${esc(d.og_locale)}">`);

        lines.push('');
        lines.push('<!-- Twitter -->');
        lines.push(`<meta name="twitter:card" content="${esc(d.twitter_card || 'summary_large_image')}">`);
        if (d.canonical) lines.push(`<meta name="twitter:url" content="${esc(d.canonical)}">`);
        if (d.title) lines.push(`<meta name="twitter:title" content="${esc(d.title)}">`);
        if (d.description) lines.push(`<meta name="twitter:description" content="${esc(d.description)}">`);
        if (d.og_image) lines.push(`<meta name="twitter:image" content="${esc(d.og_image)}">`);
        if (d.twitter_site) lines.push(`<meta name="twitter:site" content="${esc(d.twitter_site)}">`);
        if (d.twitter_creator) lines.push(`<meta name="twitter:creator" content="${esc(d.twitter_creator)}">`);

        codeOutput.textContent = lines.join('\n');

        // Previews
        previewUrl.textContent = d.canonical || 'https://example.com/';
        previewTitle.textContent = d.title || 'Your Webpage Title Here';
        previewDesc.textContent = d.description || 'Your webpage meta description will appear here in Google search results.';

        previewDomain.textContent = extractHost(d.canonical);
        previewSocialTitle.textContent = d.title || 'Your Webpage Title Here';
        previewSocialDesc.textContent = d.description || 'Your webpage description.';

        if (d.og_image) {
            previewImgBox.innerHTML = '';
            const img = document.createElement('img');
            img.src = d.og_image;
            img.alt = 'Social Preview';
            img.onerror = function () {
                previewImgBox.innerHTML = '<span>Unable to load image</span>';
            };
            previewImgBox.appendChild(img);
        } else {
            previewImgBox.innerHTML = '<span>No OG image provided</span>';
        }
    }

    form.addEventListener('input', updateAll);
    form.addEventListener('change', updateAll);

    colorPicker.addEventListener('input', function () {
        colorText.value = colorPicker.value;
        updateAll();
    });

    colorText.addEventListener('input', function () {
        if (/^#[0-9A-Fa-f]{6}$/.test(colorText.value.trim())) {
            colorPicker.value = colorText.value.trim();
        }
    });

    copyBtn.addEventListener('click', function () {
        navigator.clipboard.writeText(codeOutput.textContent).then(function () {
            copyToast.style.display = 'inline';
            setTimeout(function () {
                copyToast.style.display = 'none';
            }, 2000);
        });
    });

    resetBtn.addEventListener('click', function () {
        ['title', 'description', 'keywords', 'author', 'canonical', 'revisit', 'og_site_name', 'og_image', 'twitter_site', 'twitter_creator'].forEach(function (id) {
            const el = document.getElementById(id);
            if (el) el.value = '';
        });
        updateAll();
    });

    updateAll();
})();
</script>
</body>
</html>
