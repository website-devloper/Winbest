<?php

if (!function_exists('toastrNotification')) {
    /**
     * Flash Toastr notification message to the session.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    function toastrNotification($type, $message)
    {
        session()->flash('toastrNotification', compact('type', 'message'));
    }
}
