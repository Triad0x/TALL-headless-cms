<div x-data x-init="
    $watch('$flux.appearance', value => {
        applyMaryUiTheme(value)
    });
    // Run on first load
    applyMaryUiTheme($flux.appearance);
"></div>