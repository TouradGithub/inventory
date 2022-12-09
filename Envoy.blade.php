@servers(['web' => 'u643120521@82.180.172.204 -p65002'])
@setup
$repository= 'git@github.com:TouradGithub/inventory.git';
$branch = isset($branch) ? $branch : "master";

$app_dir = "/home/u643120521";
$public_folder_path="/home/u643120521/domains/rimfoot.com/public_html/touradmedlemin/";

$releases_dir = "$app_dir/touradmedlemin/releases";
$release = date('YmdHis');
$new_release_dir ="$releases_dir/$release";
$branch_path="$app_dir/$branch";

$keep = 1;
$new_release_dir ="/home/u643120521/domains/rimfoot.com/public_html/inventory/";
@endsetup
$server_dir=$branch;


@story('deploy')

clone_repository
run_composer
setup_app
clean
succeed
@endstory

{{-- TMBYC26781271$m --}}
{{-- u643120521_inventory --}}
{{-- u643120521_inventory	 --}}

@task('clone_repository')
free -g -h -t && sync && free -g -h
echo 'Cloning repository'
echo 'Cloning  branch {{ $branch }} from rep {{ $repository }} in {{ $new_release_dir }}'


echo '  ok'
git clone --depth 1 --branch {{ $branch }} {{ $repository }} {{ $new_release_dir }}


cd {{ $new_release_dir }}
@endtask

@task('run_composer')
echo "Starting deployment ({{ $release }})"
pwd
echo {{ $new_release_dir }}
cd {{ $new_release_dir }}
echo "moved succes".{{ $new_release_dir }}
composer install
echo "composer installed  succefuly"
npm i vue@next vue-loader
npm install vue-router@4
echo "npm installed  succefuly"
@endtask







@task('setup_app')
echo "Setting up the app"
cd {{ $new_release_dir }}
pwd
free -g -h -t && sync && free -g -h
echo "Run migrate"
cp .env.example .env
php artisan key:generate --force
echo " test key ok"
php artisan optimize:clear
echo " test optimize ok"
 php artisan migrate:fresh --seed
echo " test migrate ok"
php artisan optimize
echo " test optimize ok"
php artisan view:clear
echo " test view ok"
free -h
echo " test free -h"

@endtask



@task('clean')
echo "Clean old releases";
@endtask

@task('succeed')
free -g -h -t && sync && free -g -h -t
echo 'Deployment completed successfully. the new {{$branch}} releases {{$release}} is live now :) '
@endtask