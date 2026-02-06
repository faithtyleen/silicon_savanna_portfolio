<?php
// Check if mod_rewrite is loaded
echo "<h2>Apache Module Check</h2>";

// Method 1: Check via apache_get_modules()
if (function_exists('apache_get_modules')) {
    $modules = apache_get_modules();
    if (in_array('mod_rewrite', $modules)) {
        echo "✅ mod_rewrite is ENABLED<br>";
    } else {
        echo "❌ mod_rewrite is NOT loaded<br>";
        echo "Loaded modules: " . implode(', ', $modules);
    }
} else {
    echo "⚠️ apache_get_modules() not available<br>";
}

// Method 2: Check via phpinfo
echo "<h3>Checking phpinfo() for mod_rewrite...</h3>";
ob_start();
phpinfo(INFO_MODULES);
$phpinfo = ob_get_clean();

if (strpos($phpinfo, 'mod_rewrite') !== false) {
    echo "✅ mod_rewrite found in phpinfo";
} else {
    echo "❌ mod_rewrite NOT found in phpinfo";
}
?>