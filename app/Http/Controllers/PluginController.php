<?php

namespace App\Http\Controllers;
use Symfony\Component\Process\Process;
use App\Models\Plugin;
use App\Models\Venta;
use Illuminate\Http\Request;
//use Hooks\Costumer;

class PluginController extends Controller
{
    private $costumer;

    // public function __construct(Costumer $costumer)
    // {
    //     $this->costumer = $costumer;
    // }

    public function index()
    {
        $plugins = Plugin::all();
        return view("home", ['plugins' => $plugins]);
    }

    public function ventas()
    {
        // $ventas = Venta::all();
        // return view("ventas.index", ['ventas' => $ventas]);
        return view("Customer::index");
    }

    public function convert($id)
    {
        $v = Venta::where('id',$id)->get();
        $price = $v[0]->price_total;
        $venta = new Venta();
        $price = $venta->convert($v[0]);
        return view("ventas.venta", ['venta' => $v[0], 'new_price' => $price]);
    }

    public function insert()
    {
        $plugins = Plugin::all();
        return view("plugins.insert", ['plugins' => $plugins]);
    }

    public function save(Request $request)
    {
        $r = $request->all();
        $url = $r['url'];
        $properties = register($url);
        $plugin = Plugin::create([
            'name' => $properties['name'],
            'description' => $properties['description'],
            'author' => $properties['author'],
            'version' => $properties['version'],
            'status' => 0,
            'last_added' => 1
        ]);
        
        return redirect()->route('modules');
    }
    
    public function modules()
    {
        $plugins = Plugin::all();

        return view("plugins.list", ["plugins" => $plugins]);
    }

    public function changeStatus(Request $request, $id, $status)
    {
        $newStatus = $status == 'Activar' ? 1 : 0;
        $plugin = Plugin::where('id',$id)->update(['status' => $newStatus]);

        if($plugin && $status == 'Desactivar') {
            $plugin = Plugin::find($id);
            makeInvisible($plugin->name);
        }

        if($plugin && $status == 'Activar') {
            $plugin = Plugin::find($id);
            makeVisible($plugin->name);
            view("layouts._nav", ["pluginName" => $plugin->name, "pluginStatus" => $plugin->status]);
        }

        return \redirect()->route('modules');
    }

    public function actualizar()
    {
        $path = base_path() . "/Modules";
        $plugins = list_dirs($path);
        $plugins = array_filter($plugins, function($name){
            return $name[0] != ".";
        });
        $pluginsRegistered = Plugin::all();
        $pluginsRegistered = object_to_array($pluginsRegistered);
        // dd($pluginsRegistered);
        // dd(!in_array("ConvertMoney",$plugins));
        
        $exists = false;
        $pluginToRegister = "";
        foreach ($plugins as $plugin) {
            if(!in_array($plugin,$pluginsRegistered)) {
                $pluginToRegister = $plugin;
                $exists = true;
                break;
            }
        }
        // dd($pluginToRegister);

        if($pluginToRegister != "") {
            $properties = register("",$pluginToRegister);
            $plugin = Plugin::create([
                'name' => $properties['name'],
                'description' => $properties['description'],
                'author' => $properties['author'],
                'version' => $properties['version'],
                'status' => 0,
                'last_added' => 1
            ]);
        }
        
        return redirect()->route('modules');
    }

    public function delete($id,$module)
    {
        $plugin = Plugin::find($id);
        $path = $plugin->status ? (base_path() . "/Modules" . "/" . $module) : (base_path() . "/Modules" . "/." . $module);
        $plugin->delete();
        
        return delete_dir($path) ? redirect()->route('modules') : "Ha ocurrido un error al eliminar el módulo";
    }
}
