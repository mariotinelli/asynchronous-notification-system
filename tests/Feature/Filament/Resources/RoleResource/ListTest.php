<?php


use App\Filament;
use App\Filament\Resources\RoleResource;
use App\Models\Role;
use App\Models\User;
use Filament\Actions\CreateAction;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Livewire\livewire;

beforeEach(function () {

    $this->admin = User::factory()->create();

    actingAs($this->admin);

    $this->livewire = livewire(Filament\Resources\RoleResource\Pages\ManageRoles::class);

});

test('can create a role', function () {


    $newRole = Role::factory()->make();

    livewire(RoleResource::class)
        ->callAction(CreateAction::class, [
            'name' => $newRole->name,
        ])->assertHasNoActionErrors();

    assertDatabaseHas('roles', [
        'name' => $newRole->name,
    ]);

    assertDatabaseHas('audits', [
        'auditable_type' => Role::class,
        'event' => 'created',
        'old_values' => [],
        'new_values' => makeAuditNewValues($newRole),
        //'http://localhost/livewire/update'
        'url' => url(''),
    ]);

});
