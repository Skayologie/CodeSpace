<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert([
            ["name" => "post.create"],
            ["name" => "post.edit"],
            ["name" => "post.delete"],
            ["name" => "post.view"],
            ["name" => "post.manage"],

            ["name" => "comment.create"],
            ["name" => "comment.edit"],
            ["name" => "comment.delete"],
            ["name" => "comment.view"],
            ["name" => "comment.manage"],

            ["name" => "user.view"],
            ["name" => "user.manage"], // For admins or manager
            ["name" => "user.ban"],
            ["name" => "user.unban"],
            ["name" => "user.assign_roles"],

            ["name" => "category.create"],
            ["name" => "category.edit"],
            ["name" => "category.delete"],
            ["name" => "category.view"],

            ["name" => "tag.create"],
            ["name" => "tag.edit"],
            ["name" => "tag.delete"],
            ["name" => "tag.view"],

            ["name" => "report.create"], // Users can report content
            ["name" => "report.view"],   // manager/Admins can see reports
            ["name" => "report.manage"], // manager/Admins can act on reports

            ["name" => "admin.access"], // Grants access to admin panel
            ["name" => "settings.manage"], // Modify platform settings

            ["name" => "role.create"],
            ["name" => "role.edit"],
            ["name" => "role.delete"],
            ["name" => "role.assign"],

            ["name" => "notification.view"],
            ["name" => "notification.manage"],

            ["name" => "message.send"],
            ["name" => "message.view"],
            ["name" => "message.delete"],

            ["name" => "like.post"],
            ["name" => "like.comment"],
            ["name" => "dislike.post"],
            ["name" => "dislike.comment"],

            ["name" => "moderation.warn"],
            ["name" => "moderation.suspend"],
            ["name" => "moderation.delete"],
        ]);
    }
}
