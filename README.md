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
$roleUserId = ['role_id' => 1, 'user_id' => 1];
$comment = fn (string $comment) => ['comment' => $comment];

# This is the same comment as it is currently existing
RoleUser::updateOrCreate($roleUserId, $comment('Give role Admin to user User'));
# This is a different comment requiring an actual update
RoleUser::updateOrCreate($roleUserId, $comment('Something else'));
```
