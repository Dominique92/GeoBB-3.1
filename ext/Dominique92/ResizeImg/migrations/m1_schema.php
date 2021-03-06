<?php
/**
*
* Resize & Exif image management extension for the phpBB Forum Software package.
*
* @copyright (c) 2016 Dominique Cavailhez
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace Dominique92\ResizeImg\migrations;

/**
 * Migration stage 1: Schema changes
 */
class m1_schema extends \phpbb\db\migration\migration
{
	/**
	 * Check if this migration is effectively installed
	 *
	 * @return bool True if this migration is installed, False if this migration is not installed
	 * @access public
	 */
	public function effectively_installed()
	{
		return $this->db_tools->sql_column_exists($this->table_prefix . 'attachments', 'exif');
	}

	/**
	 * Add the exif column to the attachments table
	 *
	 * @return array Array of table schema
	 * @access public
	 */
	public function update_schema()
	{
		return array(
			'add_columns'	=> array(
				$this->table_prefix . 'attachments'	=> array(
					'exif'	=> array('TEXT', null),
				),
			),
		);
	}

	/**
	 * Drop the exif column from the attachments table
	 *
	 * @return array Array of table schema
	 * @access public
	 */
	public function WWWrevert_schema()
	{
		return array(
			'drop_columns'	=> array(
				$this->table_prefix . 'attachments'	=> array(
					'exif',
				),
			),
		);
	}
}
