<?php namespace x\parsedown;

function page__content($content) {
    $type = $this->type;
    if (
        'Markdown' !== $type &&
        'Parsedown' !== $type &&
        'text/markdown' !== $type &&
        'text/x-parsedown' !== $type
    ) {
        return $content;
    }
    $out = new \ParsedownExtraPlugin;
    foreach (\State::get('x.parsedown', true) ?? [] as $k => $v) {
        $out->{$k} = $v;
    }
    return "" !== ($out = $out->text($content ?? "")) ? $out : null;
}

function page__description($description) {
    return \fire(__NAMESPACE__ . "\\page__title", [$description], $this);
}

function page__title($title) {
    $type = $this->type;
    if (
        'Markdown' !== $type &&
        'Parsedown' !== $type &&
        'text/markdown' !== $type &&
        'text/x-parsedown' !== $type
    ) {
        return $title;
    }
    $out = new \ParsedownExtraPlugin;
    foreach (\State::get('x.parsedown', true) ?? [] as $k => $v) {
        if (0 === \strpos($k, 'block')) {
            continue;
        }
        $out->{$k} = $v;
    }
    return "" !== ($out = $out->line($title ?? "")) ? $out : null;
}

\Hook::set('page.content', __NAMESPACE__ . "\\page__content", 2);
\Hook::set('page.description', __NAMESPACE__ . "\\page__description", 2);
\Hook::set('page.title', __NAMESPACE__ . "\\page__title", 2);

// Make property `$state->x->markdown` exist, so that other extension(s) that depend on the Markdown parser can continue
// to work by checking if property `$state->x->markdown` is set:
//
//     if (isset($state->x->markdown)) {
//         if (isset($state->x->markdown->vendor) && 'erusev/parsedown' === $state->x->markdown->vendor) {
//             // Using `erusev/parsedown`
//         } else {
//             // Using `taufik-nurrohman/markdown`
//         }
//     }
//
\State::set('x.markdown.vendor', 'erusev/parsedown');