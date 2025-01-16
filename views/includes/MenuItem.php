<!-- MenuItem.php -->
<?php
class MenuItem {
    private $path;
    private $icon;
    private $label;

    public function __construct($path, $icon, $label) {
        $this->path = $path;
        $this->icon = $icon;
        $this->label = $label;
    }

    public function render() {
        return '
        <li>
            <div data-path="' . $this->path . '" class="menu-item flex items-center gap-4 py-2 px-3 rounded-xl hover:bg-white/5">
                <div class="icon-container p-1 rounded-lg bg-white/10">
                    ' . $this->icon . '
                </div>
                <span class="text-white/90 text-sm font-medium">' . $this->label . '</span>
            </div>
        </li>';
    }
}
?>
