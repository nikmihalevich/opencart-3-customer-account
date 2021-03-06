<?php
class ModelExtensionModuleCustomerInfo extends Model {
    public function saveCustomerInfo($customer_id, $data) {
	    $query = $this->db->query("SELECT customer_id FROM `" . DB_PREFIX ."customer_info` WHERE customer_id = '" . (int)$customer_id . "'");

	    if (!isset($query->row['customer_id'])) {
            $this->db->query("INSERT INTO `" . DB_PREFIX . "customer_info` SET `customer_id` = '" . (int)$customer_id . "', `sex` = '" . (isset($data['sex']) ? (int)$data['sex'] : 0) . "', `delivery_address` = '" . $this->db->escape($data['delivery_address']) . "', `delivery_recipient_name` = '" . $this->db->escape($data['delivery_recipient_name']) . "', `review_name` = '" . $this->db->escape($data['review_name']) . "'");
        } else {
            $this->db->query("UPDATE `" . DB_PREFIX . "customer_info` SET `sex` = '" . (isset($data['sex']) ? (int)$data['sex'] : 0) . "', `delivery_address` = '" . $this->db->escape($data['delivery_address']) . "', `delivery_recipient_name` = '" . $this->db->escape($data['delivery_recipient_name']) . "', `review_name` = '" . $this->db->escape($data['review_name']) . "' WHERE `customer_id` = '" . (int)$customer_id . "'");
        }
	}

    public function removeCustomerInfo($customer_id) {
        $this->db->query("DELETE FROM `" . DB_PREFIX . "customer_info` WHERE `customer_id` = '" . (int)$customer_id . "'");
    }

    public function getCustomerInfo($customer_id) {
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX ."customer_info` WHERE customer_id = '" . (int)$customer_id . "'");

        return $query->row;
    }
}
