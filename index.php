<?php namespace x\parsedown;

function page__content($content) {
    $type = $this->type;
    if ('Markdown' !== $type && 'text/markdown' !== $type) {
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
    if ('Markdown' !== $type && 'text/markdown' !== $type) {
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