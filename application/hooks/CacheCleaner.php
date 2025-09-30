<?php
class CacheCleaner
{
    public function clear_expired_cache()
    {
        $cache_path = APPPATH . 'cache/';
        if (is_dir($cache_path)) {
            foreach (glob($cache_path . "*") as $file) {
                if (filemtime($file) < (time() - 900)) { // 15 minutes
                    unlink($file);
                }
            }
        }
    }
}
