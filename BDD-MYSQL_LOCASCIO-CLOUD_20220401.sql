CREATE TABLE users(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(255),
   lastname VARCHAR(255),
   email VARCHAR(255),
   password VARCHAR(255),
   created_at DATETIME,
   updated_at DATETIME,
   PRIMARY KEY(id)
);

CREATE TABLE cpu(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(255),
   socket VARCHAR(255),
   nbr_max_processor INT,
   nbr_cores INT,
   nbr_tread INT,
   nbr_tdp INT,
   base_frequency INT,
   boost_frequency INT,
   cache INT,
   nbr_max_memory_capacity INT,
   nbr_memory_type VARCHAR(50),
   nbr_max_memory_channel INT,
   ecc_compatible_memory BOOL,
   have_graphics_processor BOOL,
   is_for_professional BOOL,
   url VARCHAR(255),
   price INT,
   PRIMARY KEY(id),
   UNIQUE(url)
);

CREATE TABLE ram(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   frequency VARCHAR(50),
   capacity VARCHAR(50),
   version VARCHAR(50),
   have_ecc BOOL,
   is_for_professional BOOL,
   url VARCHAR(255),
   price INT,
   PRIMARY KEY(id),
   UNIQUE(url)
);

CREATE TABLE gpu(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   nbr_cores INT,
   nbr_base_frequency INT,
   nbr_boost_frequency INT,
   nub_memory_capacity VARCHAR(50),
   is_for_professional BOOL,
   url VARCHAR(255),
   price INT,
   PRIMARY KEY(id),
   UNIQUE(url)
);

CREATE TABLE firewall(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   firewall_throughput VARCHAR(50),
   threat_protection_flow VARCHAR(50),
   flow_from_ngfw VARCHAR(50),
   ips_flow_rate VARCHAR(50),
   IPsec_vpn_throughput VARCHAR(50),
   nbr_wan_ports INT,
   wan_port_throughput INT,
   nbr_lan_ports VARCHAR(50),
   lan_port_throughput INT,
   accept_4g_wan_connectivity BOOL,
   weight INT,
   form_factor VARCHAR(50),
   is_for_professional BOOL,
   url VARCHAR(255),
   price INT,
   PRIMARY KEY(id),
   UNIQUE(url)
);

CREATE TABLE disk(
   id int NOT NULL AUTO_INCREMENT,
   is_ssd BOOL,
   is_hdd BOOL,
   name VARCHAR(50),
   interface VARCHAR(50),
   writing_speed INT,
   reading_speed INT,
   is_for_professional BOOL,
   url VARCHAR(255),
   price INT,
   PRIMARY KEY(id),
   UNIQUE(url)
);

CREATE TABLE switch(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   is_managerable BOOL,
   nbr_total_ports INT,
   nbr_ports_10G_rj45 INT,
   nbr_ports_10G_sftp BOOL,
   nbr_ports_10G_sftp28 VARCHAR(50),
   nbr_ports_10G_qsfp VARCHAR(50),
   form_factor INT,
   is_for_professional BOOL,
   url VARCHAR(255),
   price INT,
   PRIMARY KEY(id),
   UNIQUE(url)
);

CREATE TABLE ups(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   form_factor VARCHAR(50),
   power_in_va INT,
   weight INT,
   is_for_professional BOOL,
   url VARCHAR(255),
   price INT,
   PRIMARY KEY(id),
   UNIQUE(url)
);

CREATE TABLE kvm(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   nbr_ports INT,
   nbr_users_total INT,
   nbr_remote_users INT,
   nbr_users_local INT,
   weight INT,
   ip_remote_access BOOL,
   is_for_professional BOOL,
   url VARCHAR(255),
   price INT,
   PRIMARY KEY(id),
   UNIQUE(url)
);

CREATE TABLE chassis(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   support_ssi_eeb_factor BOOL,
   support_ssi_ceb_factor BOOL,
   support_e_atx_factor BOOL,
   support_atx_factor BOOL,
   support_micro_atx_factor BOOL,
   nbr_total_disk_3_5_inch INT,
   nbr_total_disk_2_5_inch INT,
   weight INT,
   nbr_total_back_fan INT,
   nbr_total_fan_left INT,
   nbr_total_front_fan INT,
   nbr_total_right_fan INT,
   is_for_professional BOOL,
   url VARCHAR(255),
   price INT,
   PRIMARY KEY(id),
   UNIQUE(url)
);

CREATE TABLE network_card(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   link_speeds INT,
   nbr_ports INT,
   connection VARCHAR(50),
   host_connector VARCHAR(50),
   is_for_professional BOOL,
   url VARCHAR(255),
   price INT,
   PRIMARY KEY(id),
   UNIQUE(url)
);

CREATE TABLE raid_card(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   version_raid_supports VARCHAR(50),
   generation INT,
   host_bus_type VARCHAR(50),
   nbr_internal_ports INT,
   devices_supported VARCHAR(50),
   name_internal_connectors VARCHAR(50),
   is_for_professional BOOL,
   url VARCHAR(255),
   price INT,
   PRIMARY KEY(id),
   UNIQUE(url)
);

CREATE TABLE software_subscription(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   description VARCHAR(50),
   is_for_professional BOOL,
   url VARCHAR(255),
   price INT,
   PRIMARY KEY(id),
   UNIQUE(url)
);

CREATE TABLE telecom_subscription(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   is_adsl BOOL,
   is_vdsl INT,
   is_fiber BOOL,
   phone_lines INT,
   calls_to_fixed_phones_in_France BOOL,
   calls_to_cell_phones_in_France BOOL,
   have_tv BOOL,
   is_for_professional BOOL,
   url VARCHAR(255),
   price INT,
   PRIMARY KEY(id),
   UNIQUE(url)
);

CREATE TABLE laptop(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   screen_resolution VARCHAR(50),
   screen_size INT,
   is_tactile BOOL,
   proc_name VARCHAR(50),
   name_gpu_1 VARCHAR(50),
   name_gpu_2 VARCHAR(50),
   size_ram INT,
   size_disk VARCHAR(50),
   have_ssd BOOL,
   size_hdd VARCHAR(50),
   have_hdd VARCHAR(50),
   nb_usb_ports INT,
   weight INT,
   is_for_professional BOOL,
   url VARCHAR(255),
   price INT,
   PRIMARY KEY(id),
   UNIQUE(url)
);

CREATE TABLE power_supply(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   continous_power INT,
   standard_atx_12v BOOL,
   standard_eps_12v BOOL,
   tension INT,
   frequency_ INT,
   certification VARCHAR(50),
   have_cable BOOL,
   is_for_professional BOOL,
   url VARCHAR(255),
   price INT,
   PRIMARY KEY(id),
   UNIQUE(url)
);

CREATE TABLE tablet(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   height INT,
   lenght INT,
   width INT,
   screen_resolution VARCHAR(50),
   is_tactile BOOL,
   name_proc VARCHAR(50),
   ram INT,
   battery_life VARCHAR(50),
   wlan VARCHAR(50),
   bluetooth VARCHAR(50),
   otg VARCHAR(50),
   usb VARCHAR(50),
   have_sim_port BOOL,
   weight INT,
   is_for_professional BOOL,
   url VARCHAR(255),
   price INT,
   PRIMARY KEY(id),
   UNIQUE(url)
);

CREATE TABLE fan(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   height INT,
   width INT,
   lenght INT,
   rpm INT,
   dB_A INT,
   pin VARCHAR(50),
   is_for_professional BOOL,
   url VARCHAR(255),
   price INT,
   PRIMARY KEY(id),
   UNIQUE(url)
);

CREATE TABLE motherboard(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   is_for_professional BOOL,
   url VARCHAR(250),
   price INT,
   PRIMARY KEY(id),
   UNIQUE(url)
);

CREATE TABLE rack(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   lengh_rack_inch INT,
   max_weight INT,
   color VARCHAR(50),
   have_cooling_system BOOL,
   is_for_professional BOOL,
   url VARCHAR(255),
   price INT,
   PRIMARY KEY(id),
   UNIQUE(url)
);

CREATE TABLE boot_drive(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   interface VARCHAR(50),
   writing_speed INT,
   reading_speed VARCHAR(50),
   is_for_professional BOOL,
   url VARCHAR(255),
   price INT,
   PRIMARY KEY(id),
   UNIQUE(url)
);

CREATE TABLE rack_component(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   nb_rack_space INT,
   is_for_professional BOOL,
   url VARCHAR(255),
   price VARCHAR(50),
   id_1 INT NOT NULL,
   PRIMARY KEY(id),
   UNIQUE(url),
   FOREIGN KEY(id_1) REFERENCES rack(id)
);

CREATE TABLE systeme(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(255),
   description TEXT,
   id_motherboard INT NOT NULL,
   id_power_supply INT NOT NULL,
   id_raid_card INT NOT NULL,
   id_fan INT NOT NULL,
   id_network_card INT NOT NULL,
   id_disk INT NOT NULL,
   id_chassis INT NOT NULL,
   id_gpu INT NOT NULL,
   id_boot_drive INT NOT NULL,
   id_ram INT NOT NULL,
   id_cpu INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_motherboard) REFERENCES motherboard(id),
   FOREIGN KEY(id_power_supply) REFERENCES power_supply(id),
   FOREIGN KEY(id_raid_card) REFERENCES raid_card(id),
   FOREIGN KEY(id_fan) REFERENCES fan(id),
   FOREIGN KEY(id_network_card) REFERENCES network_card(id),
   FOREIGN KEY(id_disk) REFERENCES disk(id),
   FOREIGN KEY(id_chassis) REFERENCES chassis(id),
   FOREIGN KEY(id_gpu) REFERENCES gpu(id),
   FOREIGN KEY(id_boot_drive) REFERENCES boot_drive(id),
   FOREIGN KEY(id_ram) REFERENCES ram(id),
   FOREIGN KEY(id_cpu) REFERENCES cpu(id)
);

CREATE TABLE configuration(
   id int NOT NULL AUTO_INCREMENT,
   name VARCHAR(255),
   description TEXT,
   id_switch INT NOT NULL,
   id_rack INT NOT NULL,
   id_software_subscription INT NOT NULL,
   id_telecom_subscription INT NOT NULL,
   id_tablet INT NOT NULL,
   id_laptop INT NOT NULL,
   id_firewall INT NOT NULL,
   id_kvm INT NOT NULL,
   id_ups INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_switch) REFERENCES switch(id),
   FOREIGN KEY(id_rack) REFERENCES rack(id),
   FOREIGN KEY(id_software_subscription) REFERENCES software_subscription(id),
   FOREIGN KEY(id_telecom_subscription) REFERENCES telecom_subscription(id),
   FOREIGN KEY(id_tablet) REFERENCES tablet(id),
   FOREIGN KEY(id_laptop) REFERENCES laptop(id),
   FOREIGN KEY(id_firewall) REFERENCES firewall(id),
   FOREIGN KEY(id_kvm) REFERENCES kvm(id),
   FOREIGN KEY(id_ups) REFERENCES ups(id)
);

CREATE TABLE discount(
   id int NOT NULL AUTO_INCREMENT,
   code VARCHAR(255),
   price_discount INT,
   pourcentage_discount INT,
   state BOOL,
   PRIMARY KEY(id)
);

CREATE TABLE payment(
   id int NOT NULL AUTO_INCREMENT,
   paid_at DATETIME,
   transaction_nbr VARCHAR(255),
   price INT,
   PRIMARY KEY(id)
);

CREATE TABLE subscription(
   id int NOT NULL AUTO_INCREMENT,
   comment VARCHAR(512),
   start_at DATETIME NOT NULL,
   end_at DATETIME,
   price INT,
   created_at DATETIME,
   updated_at DATETIME,
   id_users INT NOT NULL,
   id_configuration INT NOT NULL,
   id_discount INT,
   PRIMARY KEY(id),
   FOREIGN KEY(id_users) REFERENCES users(id),
   FOREIGN KEY(id_configuration) REFERENCES configuration(id),
   FOREIGN KEY(id_discount) REFERENCES discount(id)
);

CREATE TABLE invoice(
   id int NOT NULL AUTO_INCREMENT,
   comment TEXT,
   quote_name VARCHAR(255),
   invoice_name VARCHAR(255),
   updated_at DATETIME,
   created_at DATETIME,
   state BOOL,
   id_payment INT NOT NULL,
   id_subscription INT,
   PRIMARY KEY(id),
   UNIQUE(id_payment),
   FOREIGN KEY(id_payment) REFERENCES payment(id),
   FOREIGN KEY(id_subscription) REFERENCES subscription(id)
);

CREATE TABLE systeme_configuration(
   id_systeme INT,
   id_configuration INT,
   PRIMARY KEY(id_systeme, id_configuration),
   FOREIGN KEY(id_systeme) REFERENCES systeme(id),
   FOREIGN KEY(id_configuration) REFERENCES configuration(id_configuration)
);
