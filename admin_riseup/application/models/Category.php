<?php
class Category
{
	
	function __construct()
	{
		$this->Controller = new Controller;
		$this->db = new Database;
	}
	public function editCategoryData($data)
	{
		if (!isset($data[0])) {
			header("location: /feed/Dashboard");
		}else{
			$this->db->query('SELECT * FROM category WHERE Id = :Id');
			$this->db->bind(':Id',$data[0]);
			$Category_data = $this->db->single();

			$Category_data = [
				'Id' => $Category_data->Id,
				'Name' => $Category_data->Category_Name
			];
			return $Category_data;
		}
	}
	public function EditCategoryNow($data)
	{
		$this->db->query('UPDATE category SET Category_Name = :Category_Name WHERE Id = :Id');
		$this->db->bind(':Id', $data[0]);
		$this->db->bind(':Category_Name', $data[1]);
		if ($this->db->execute()) {
			header('location: /feed/Category');
		}else{
			header('location: /feed/Dashboard');
		}
	}

	public function deleteCategoryNow($data)
	{
		$this->db->query('DELETE FROM category WHERE Id = :Id');
		$this->db->bind(':Id', $data);
		if ($this->db->execute()) {
			header('location: /feed/Category');
		}else{
			header('location: /feed/Dashboard');
		}
	}

	public function addCategoryNow($data)
	{
		$this->db->query('INSERT INTO category(Category_Name) VALUES(:Category_Name)');
		$this->db->bind(':Category_Name', $data);
		if ($this->db->execute()) {
			header('location: /feed/Category');
		}else{
			header('location: /feed/Dashboard');
		}
	}

	public function getCategoryListData()
	{
		$this->db->query('SELECT * FROM category');
		$Category_Data = $this->db->resultSet();

		$Data ='';
		foreach ($Category_Data as $key => $value) {
			$this->db->query('SELECT Url From post WHERE Category_Id  = :Category_Id');
			$this->db->bind(':Category_Id', $value->Id);
			$Articles = count($this->db->resultSet());

			$Data .='
					<tr>
						<td>'.$value->Id.'</td>
						<td>'.$value->Category_Name.'</td>
						<td>'.$Articles.'</td>
						<td>
							<div class="slit-at-btn-div">
								<a href="/feed/CategoryEdit/'.$value->Id.'"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"></path></svg></a>
								<a href="/Categorys/deleteCategory/'.$value->Id.'"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg></a>
							</div>
						</td>
					</tr>';
		}
		$Category = [
			'Category_List' => $Data
		];
		return $Category;
	}
}
?>