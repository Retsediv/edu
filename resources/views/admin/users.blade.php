@extends('templates.page')

@section('page_title', 'Модерування учнями школи')

@section('page')
<div class="container ui">
        <br>
        <table id="admin-user" class="ui compact celled definition table">
            <thead>
            <tr>
                <th></th>
                <th v-on:click="sortBy('name')"><a href="#">Ім'я</a></th>
                <th v-on:click="sortBy('last_name')"><a href="#">Прізвище</a></th>
                <th v-on:click="sortBy('user_class.name')"><a href="#">Kлас</a></th>
                <th v-on:click="sortBy('roles[0].role_name')"><a href="#">Тип</a></th>
                <th v-on:click="sortBy('is_moderated')"><a href="#">Промодерований</a></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users | orderBy sortKey reverse">
                <td class="collapsing">
                    <div class="ui fitted slider checkbox">
                        <input type="checkbox"> <label></label>
                    </div>
                </td>
                <td>@{{ user.name }}</td>
                <td>@{{ user.last_name }}</td>
                <td>@{{ user.user_class.name }}</td>
                <td>@{{ user.roles[0].role_name }}</td>
                <td>@{{ user.is_moderated }}</td>
            </tr>
            </tbody>
            <tfoot class="full-width">
            <tr>
                <th></th>
                <th colspan="5">
                    <div class="ui right floated primary icon buttons">
                        {{--<i class="user icon"></i> Add User--}}

                        <button class="ui button" v-show="prev_link" v-on:click="loadNewUsers(prev_link)">Назад</button>
                        <div class="or" v-show="prev_link && next_link"></div>
                        <button class="ui positive button" v-show="next_link" v-on:click="loadNewUsers(next_link)">Вперед</button>

                    </div>
                    <div class="ui small button">
                        Прийняти
                    </div>
                    <div class="ui small  disabled button">
                        Прийняти всі
                    </div>
                </th>
            </tr>
            </tfoot>
        </table>

    </div>

@stop