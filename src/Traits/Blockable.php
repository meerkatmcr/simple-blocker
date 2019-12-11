<?php

namespace MeerkatMcr\SimpleBlocker\Traits;

trait Blockable {
    public function block()
    {
        $this->blocked_at = now();
        return $this;
    }

    public function unblock()
    {
        $this->blocked_at = null;
        return $this;
    }

    public function isBlocked()
    {
        return !is_null($this->blocked_at);
    }
}
