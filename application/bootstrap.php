<?php
require_once 'core/db.php';
require_once 'core/sessions.php';
Session::init();
// ���������� ����� ����
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/userinfo.php';
require_once 'core/jsrequire.php';

/*
����� ������ ������������ �������������� ������, ����������� ��������� ����������:
	> ��������������
	> �����������
	> ������ � �������
	> ���������� ��� ������� � ������
	> ORM
	> Unit ������������
	> Benchmarking
	> ������ � �������������
	> Backup
	> � ��.
*/

require_once 'core/route.php';

Route::start(); // ��������� �������������

