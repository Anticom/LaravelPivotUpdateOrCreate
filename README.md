# Investigate Pivot::updateOrCreate

Set up the experiment:
```sh
composer i
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate --seed
```
(Take a look at [`DatabaseSeeder.php`](database/seeders/DatabaseSeeder.php))

---

Start a tinker session:
```sh
./vendor/bin/sail tinker
```

Execute the following code line by line (excluding the comments obviously):
```php
# Set up utilities
$firstUserAdminRole = ['role_id' => 1, 'user_id' => 1];
$comment = fn (string $comment) => ['comment' => $comment];

# This is the same comment as it is currently existing
RoleUser::updateOrCreate($firstUserAdminRole, $comment('Give role Admin to user First'));
# This is a different comment requiring an actual update
RoleUser::updateOrCreate($firstUserAdminRole, $comment('Something else'));

# Make sure it's not depending on the specific foreign keys
$secondUserModeratorRole = ['role_id' => 2, 'user_id' => 2];
# This is the same comment as it is currently existing
RoleUser::updateOrCreate($secondUserModeratorRole, $comment('Give role Moderator to user Second'));
# This is a different comment requiring an actual update
RoleUser::updateOrCreate($secondUserModeratorRole, $comment('Something else'));
```
