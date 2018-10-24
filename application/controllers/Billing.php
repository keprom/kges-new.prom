<?php
/**
 * Created by PhpStorm.
 * User: Айдан
 * Date: 26.07.2018
 * Time: 15:36
 */

class Billing extends CI_Controller
{

    public function __construct()
    {
        set_time_limit(0);
        parent::__construct();
        $is_login = $this->session->userdata('is_login');

        if ($is_login != TRUE) {
            redirect("login/index");
            die();
        }
//        $this->output->enable_profiler(true);
    }

    #левая часть шаблона
    public function left($title = NULL)
    {
        $data['title'] = is_null($title) ? 'Промышленный отдел' : $title;
        $this->load->view('left', $data);
    }

    #правая часть шаблона
    public function right()
    {
        $this->load->view('right');
    }

    public function index()
    {
        $this->db->order_by('dogovor');
        $data['firms'] = $this->db->get("industry.firm_overview")->result();


        $this->left('Главная');
        $this->load->view('billing/index', $data);
        $this->right();
    }

    /*ограничение по правам*/
    private function execute($function)
    {
        if (($this->session->userdata('billing/' . $function) == 't') or
            ($this->session->userdata('login') == 'programmist') or ($this->session->userdata('login') == 'admin')) {
            eval('$this->' . $function . '();');
        } else {
            exit("У вас недостаточно прав для выполнения данного действия!");
        }
    }

    /*данные фирмы*/
    public function firm()
    {
        $firm_id = (int)$this->uri->segment(3);
        $data['r'] = $this->get_firm_info($firm_id);
        $data['period'] = $this->db->get("industry.selected_period")->result();
        $data['is_closed'] = $this->db->query("select industry.is_closed({$firm_id}) as closed")->row();

        $this->left($data['r']->dogovor);
        $this->load->view('billing/firm', $data);
        $this->execute("points");
        $this->right();
    }

    /*точки учета фирмы*/
    private function points()
    {
        $this->db->where('firm_id', (int)$this->uri->segment(3));
        $this->db->order_by('tp_name');
        $result = $this->db->get("industry.point_list");
        $data['result'] = $result;
        $this->load->view("billing/points_view", $data);
        $this->execute("add_point");
    }

    /*добавление новых точек учета*/
    private function add_point()
    {
        $data['firm_id'] = (int)$this->uri->segment(3);
        $this->db->order_by('name');
        $data['tps'] = $this->db->get('industry.tp');
        $this->load->view("billing/add_billing_point", $data);
    }

    /*форма для редактирования*/
    public function firm_edit()
    {
        $firm_id = (int)$this->uri->segment(3);
        $this->db->where('id', $firm_id);
        $data['r'] = $this->db->get("industry.firm")->row();
        $data['period'] = $this->db->get("industry.selected_period")->result();
        $this->db->order_by('name');
        $data['firm_subgroup'] = $this->db->get('industry.firm_subgroup')->result();
        $this->db->order_by('name');
        $data['bank'] = $this->db->get('industry.bank')->result();
        $this->db->order_by('name');
        $data['is_pot'] = $this->db->get('industry.poter')->result();
        $this->db->order_by('id');
        $data['period'] = $this->db->get('industry.period')->result();
        $this->db->order_by('name');
        $data['user'] = $this->db->get('industry.user')->result();
        $this->db->order_by('name');
        $data['firm_otrasl'] = $this->db->get('industry.firm_otrasl')->result();
        $this->db->order_by('name');
        $data['firm_power_group'] = $this->db->get('industry.firm_power_group')->result();
        $this->db->order_by('name');
        $data['ture'] = $this->db->get('industry.ture')->result();
        $this->left($data['r']->dogovor . ". Данные фирмы");
        $this->load->view("billing/firm_edit", $data);
        $this->right();
    }

    /*сохранение изменений в данных организации*/
    public function firm_edition()
    {
        $this->db->where('id', $this->uri->segment(3));
        if ($this->input->post('phase_a') == '') {
            $_POST['phase_a'] = NULL;
        }
        if ($this->input->post('phase_b') == '') {
            $_POST['phase_b'] = NULL;
        }
        if ($this->input->post('phase_c') == '') {
            $_POST['phase_c'] = NULL;
        }
        $this->db->update('industry.firm', $_POST);
        redirect("billing/firm/{$this->uri->segment(3)}");
    }

    public function add_firm()
    {
        $this->db->order_by('name');
        $data['firm_subgroup'] = $this->db->get('industry.firm_subgroup')->result();
        $this->db->order_by('name');
        $data['bank'] = $this->db->get('industry.bank')->result();
        $this->db->order_by('name');
        $data['is_pot'] = $this->db->get('industry.poter')->result();
        $this->db->order_by('id');
        $data['period'] = $this->db->get('industry.period')->result();
        $this->db->order_by('name');
        $data['user'] = $this->db->get('industry.user')->result();
        $this->db->order_by('name');
        $data['firm_otrasl'] = $this->db->get('industry.firm_otrasl')->result();
        $this->db->order_by('name');
        $data['firm_power_group'] = $this->db->get('industry.firm_power_group')->result();
        $this->db->order_by('name');
        $data['ture'] = $this->db->get('industry.ture')->result();

        $this->left();
        $this->load->view("billing/add_firm", $data);
        $this->right();
    }

    function adding_firm()
    {
//        echo "<pre>";
        $_POST = array_filter($_POST, function ($value) {
            return !empty($value);
        });
//        var_dump($_POST);
//        echo "</pre>";
//        die();
        $this->db->insert("industry.firm", $_POST);
        redirect("billing/index");
    }

    /*ведомость фирмы*/
    public function vedomost()
    {
        $sql = "SELECT * FROM industry.firm WHERE id=" . $this->input->get('firm_id');
        $data['firm'] = $this->db->query($sql)->row();

        if ($_GET['fast_met'] == 'true') {
            $sql = "SELECT * FROM industry.firm_vedomost WHERE firm_id=" . $this->input->get('firm_id') . " and period_id=" . $this->input->get('period_id');
            $data['vedomost'] = $this->db->query($sql);
            $sql = "SELECT * FROM industry.firm_itog_vedomost where firm_id=" . $this->input->get('firm_id') . " and period_id=" . $this->input->get('period_id');
            $data['itogo'] = $this->db->query($sql)->row();
            $data['met'] = 'fast';
        } elseif($_GET['fast_met'] == 'false') {
            $sql = "SELECT * FROM industry.vedomost WHERE firm_id=" . $this->input->get('firm_id') . " and period_id=" . $this->input->get('period_id');
            $data['vedomost'] = $this->db->query($sql);
            $sql = "SELECT * FROM industry.vedomost_itog where firm_id=" . $this->input->get('firm_id') . " and period_id=" . $this->input->get('period_id');
            $data['itogo'] = $this->db->query($sql)->row();
            $data['met'] = 'old';
        }

        #fine
        $data['is_fine'] = $this->db->query("select count(*) as is_fine from industry.fine_firm where firm_id = {$this->input->get('firm_id')} and period_id = {$this->input->get('period_id')}")->row()->is_fine;
        if ($data['is_fine']) {
            $this->db->where('id', $this->input->get('period_id'));
            $giveout_date = $this->db->get('industry.period')->row()->end_date;

            #день выдачи, если за прошлый месяц ведомость - последний день того месяца
            if ((date('n')) != (date('n', strtotime($giveout_date)))) {
                $giveout_day = date('d', strtotime($giveout_date));
            } else {
                $giveout_day = date('d');
                $giveout_date = date('Y-m-d');
            }

            $data['giveout_date'] = $giveout_date;
            $data['fine_giveout_value'] = $this->db->query("select * from industry.fine_calc_firm({$this->input->get('firm_id')}, {$this->input->get('period_id')},{$giveout_day})")->row()->fine_calc_firm;
        } else {
            $data['fine_giveout_value'] = 0;
        }
        #end of fine

        $data['period_id'] = $this->input->get('period_id');

        if ($data['period_id'] < 116) {
            $data['fine_giveout_value'] = 0;
        }

        $sql = "SELECT * FROM industry.firm_oplata_itog where firm_id=" . $this->input->get('firm_id') . " and period_id=" . $this->input->get('period_id');
        if ($this->db->query($sql)->num_rows() > 0) {
            $data['oplata_value'] = $this->db->query($sql)->row()->oplata_value;
        } else {
            $data['oplata_value'] = 0;
        }

        $this->load->view("billing/vedomost", $data);
    }

    /*выбор месяца для СФ*/
    public function pre_sf()
    {
        $data['r'] = $this->get_firm_info($this->uri->segment(3));
        $data['period'] = $this->db->get("industry.selected_period")->result();
        $this->left($data['r']->dogovor . '. Месяц выдачи СФ');
        $this->load->view("billing/sf/pre_sf", $data);
        $this->right();
    }

    /*редактирование полей СФ*/
    public function pre_sf2()
    {
        $this->db->order_by('id');
        $data['signer'] = $this->db->get("industry.signer")->result();
        $data['firm_id'] = $this->input->get('firm_id');
        $data['period_id'] = $this->input->get('period_id');
        $this->db->where('period_id', $this->input->get('period_id'));
        $this->db->where('firm_id', $this->input->get('firm_id'));
        $data['r'] = $this->db->get('industry.schetfactura_date')->row();
        $this->db->where('id', $_GET["firm_id"]);
        $data['firm'] = $this->db->get('industry.firm')->row();
        $this->left($data['firm']->dogovor . '. Поля СФ');
        $this->load->view("billing/sf/pre_sf2", $data);
        $this->right();
    }

    /*СФ собственной персоной*/
    public function sf()
    {
        //обновление полей
        $this->db->where('id', $this->input->post('firm_id'));
        $this->db->update('industry.firm', array(
                'edit1' => $this->input->post('edit1'),
                'edit2' => $this->input->post('edit2'),
                'edit3' => $this->input->post('edit3'),
                'edit4' => $this->input->post('edit4'),
                'edit5' => $this->input->post('edit5'),
                'edit6' => $this->input->post('edit6'),
                'edit7' => $this->input->post('edit7'),
                'dog2' => $this->input->post('dog2'),
                'edit8' => $this->input->post('edit8'),

            )
        );

        $this->db->where('period_id', $_POST['period_id']);
        $this->db->where('firm_id', $_POST['firm_id']);
        $this->db->update('industry.schetfactura_date', array(
                'date' => $_POST['data_schet'],
                'schet_nakl' => $_POST['schet_nakl'],
                'data_nakl' => $_POST['data_nakl']
            )
        );

        //косяк 1
        if ($this->input->post('period_id') >= 116) {
            $this->db->where('period_id', $this->input->post('period_id'));
            $this->db->where('firm_id', $this->input->post('firm_id'));
            $data['do_fine'] = $this->db->get("industry.fine_firm")->num_rows();
        } else {
            $data['do_fine'] = 0;
            $data['fine_value'] = 0;
        }

        if ($data['do_fine']) {
            $data['fine_value'] = $this->db->query("select * from industry.fine_calc_firm({$_POST['firm_id']}, {$_POST['period_id']})")->row()->fine_calc_firm;

            $this->db->where('period_id', $_POST['period_id']);
            $this->db->where('firm_id', $_POST['firm_id']);
            $isset_fine = $this->db->get('industry.fine_saldo')->num_rows();
            if ((isset($isset_fine)) and ($isset_fine > 0)) {
                $this->db->where('period_id', $_POST['period_id']);
                $this->db->where('firm_id', $_POST['firm_id']);
                $data['fine_saldo'] = $this->db->get('industry.fine_saldo')->row()->value;
            }

            $this->db->where('period_id', $_POST['period_id']);
            $this->db->where('firm_id', $_POST['firm_id']);
            $isset_fine = $this->db->get('industry.fine_firm_oplata_itog')->num_rows();
            if ((isset($isset_fine)) and ($isset_fine > 0)) {
                $this->db->where('period_id', $_POST['period_id']);
                $this->db->where('firm_id', $_POST['firm_id']);
                $data['fine_oplata'] = $this->db->get('industry.fine_firm_oplata_itog')->row()->fine_oplata_value;
            } else {
                $data['fine_oplata'] = 0;
            }
        }

        $this->db->where('period_id', $_POST['period_id']);
        $this->db->where('firm_id', $_POST['firm_id']);
        $isset_fine = $this->db->get('industry.firm_oplata_itog')->num_rows();
        if ((isset($isset_fine)) and ($isset_fine > 0)) {
            $this->db->where('period_id', $_POST['period_id']);
            $this->db->where('firm_id', $_POST['firm_id']);
            $data['oplata'] = $this->db->get('industry.firm_oplata_itog')->row()->oplata_value;
        } else {
            $data['oplata'] = 0;
        }

        $this->db->where('period_id', $_POST['period_id']);
        $this->db->where('firm_id', $_POST['firm_id']);
        $data['saldo'] = $this->db->get('industry.saldo')->row()->value;

        //плагин для перевода числа в текст
        $this->load->library('chislo');

        $data['org'] = $this->db->get("industry.org_info")->row();

        $this->db->where('tariff_value <>', 0);
        $this->db->where('firm_id', $this->input->post('firm_id'));
        $this->db->where('period_id', $this->input->post('period_id'));
        $data['s'] = $this->db->get("industry.firm_schetfactura")->result();

        $this->db->where('firm_id', $this->input->post('firm_id'));
        $this->db->where('period_id', $this->input->post('period_id'));
        $data['schetfactura_date'] = $this->db->get('industry.schetfactura_date')->row();

        $this->db->where('id', $this->input->post('firm_id'));
        $data['firm'] = $this->db->get('industry.firm')->row();

        $data['dog2'] = $_POST['dog2'];
        $data['edit1'] = $_POST['edit1'];
        $data['edit2'] = $_POST['edit2'];
        $data['edit3'] = $_POST['edit3'];
        $data['edit4'] = $_POST['edit4'];
        $data['edit5'] = $_POST['edit5'];
        $data['edit6'] = $_POST['edit6'];
        $data['edit7'] = $_POST['edit7'];
        $data['schet_nakl'] = $_POST['schet_nakl'];
        $data['data_nakl'] = $_POST['data_nakl'];
        $data['edit8'] = $_POST['edit8'];
        $data['data_schet'] = $_POST['data_schet'];
        $data['schet2'] = $_POST['schet2'];

        $this->db->where('id', $_POST['period_id']);
        $data['period'] = $this->db->get('industry.period')->row();

        $this->db->where('id', $data['firm']->bank_id);
        $data['bank'] = $this->db->get('industry.bank')->row();

        $this->db->where('period_id', $_POST['period_id']);
        $this->db->where('firm_id', $_POST['firm_id']);
        $data['itog'] = $this->db->get("industry.firm_itog_vedomost")->row();

        $this->db->where('id', $this->input->post('signer_id'));
        $data['signer'] = $this->db->get("industry.signer")->row();

        if (isset($_POST['nakl'])) {
            $this->load->view("billing/sf/nakl", $data);
        } else {
            $this->load->view("billing/sf/sf", $data);
        }
    }

    private function get_firm_nach($firm_id, $period_id)
    {
        $this->db->where('firm_id', $firm_id);
        $this->db->where('period_id', $period_id);
        $temp = $this->db->get("industry.firm_itog_vedomost")->row();
        return is_null($temp) ? 0 : $temp->itogo_with_nds;
    }

    private function get_firm_oplata($firm_id, $period_id)
    {
        $this->db->where('firm_id', $firm_id);
        $this->db->where('period_id', $period_id);
        $temp = $this->db->get("industry.firm_oplata_itog")->row();
        return is_null($temp) ? 0 : $temp->oplata_value;
    }

    private function get_firm_saldo($firm_id, $period_id)
    {
        $this->db->where('firm_id', $firm_id);
        $this->db->where('period_id', $period_id);
        $temp = $this->db->get("industry.saldo")->row();
        if (is_null($temp)) {
            die("no saldo with firm_id = {$firm_id} on period_id = {$period_id}");
        }
        return $temp->value;
    }

    private function get_firm_info($firm_id)
    {
        $this->db->where('id', $firm_id);
        $temp = $this->db->get('industry.firm_view')->row();
        if (is_null($temp)) {
            die("no firm with id = {$firm_id}");
        }
        return $temp;
    }

    public function firm_oborotka()
    {
        $period_id = $this->db->query("select * from industry.current_period_id()")->row()->current_period_id;
        $firm_id = $this->uri->segment(3);

        $data['saldo'] = $this->get_firm_saldo($firm_id, $period_id);
        $data['nach'] = $this->get_firm_nach($firm_id, $period_id);
        $data['last_nach'] = $this->get_firm_nach($firm_id, $period_id - 1);
        $data['oplata'] = $this->get_firm_oplata($firm_id, $period_id);
        $data['r'] = $this->get_firm_info($firm_id);

        $this->left($data['r']->dogovor . '. Оборотка');
        $this->load->view("billing/firm_oborotka", $data);
        $this->right();
    }

    public function firm_oplata()
    {
        $firm_id = $this->uri->segment(3);
        $this->db->where('firm_id', $firm_id);
        $data['firm_oplata'] = $this->db->get('industry.firm_oplata')->result();
        $data['r'] = $this->get_firm_info($firm_id);
        $this->left($data['r']->dogovor . '. Оплата');
        $this->load->view("billing/firm_oplata", $data);
        $this->right();
    }

    public function close_firm()
    {
        $sql = "SELECT industry.close_firm({$this->uri->segment(3)})";
        $this->db->query($sql);
        redirect("billing/firm/{$this->uri->segment(3)}");
    }

    function open_firm()
    {
        $sql = "SELECT industry.open_firm({$this->uri->segment(3)})";
        $this->db->query($sql);
        redirect("billing/firm/{$this->uri->segment(3)}");
    }

    public function edit_pokaz()
    {
        $data['r'] = $this->get_firm_info($this->uri->segment(3));
        $data['firm_id'] = $this->uri->segment(3);

        $this->db->where('firm_id', $this->uri->segment(3));
        $data['pokaz'] = $this->db->get("industry.counter_add_pokaz")->result();

        $this->left();
        $this->load->view("billing/edit_pokaz", $data);
        $this->right();
    }

    public function docs_register()
    {
        $firm_id = $this->uri->segment(3);
        $data['r'] = $this->get_firm_info($firm_id);

        $data['docs'] = $this->db->get('industry.docs')->result();

        $this->db->where('firm_id', $firm_id);
        $data['info'] = $this->db->get('industry.docs_reg_sprav')->result();

        $this->db->where('firm_id', $firm_id);
        $this->db->where('deleted_point', "false");
        $this->db->order_by('name');
        $data['points'] = $this->db->get('industry.billing_point')->result();

        $this->left();
        $this->load->view("billing/docs_register", $data);
        $this->right();
    }

}