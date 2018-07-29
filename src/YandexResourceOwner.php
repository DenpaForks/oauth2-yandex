<?php

namespace Aego\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;

class YandexResourceOwner implements ResourceOwnerInterface
{
    private $response;

    /**
     * Creates a new instance of YandexResourceOwner class.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
		if(!$response['is_avatar_empty']) {
			$response['default_avatar'] = 'https://avatars.yandex.net/get-yapic/' . $response['default_avatar_id'] . '/islands-200';
		}

        $this->response = $response;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->response['id'] ?: null;
    }

    /**
     * Gets user nickname.
     *
     * @return string|null
     */
    public function getNickname()
    {
        return $this->response['login'] ?: null;
    }

    /**
     * Gets user email.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->response['default_email'] ?: null;
    }

    /**
     * Gets display name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->response['real_name'] ?: null;
    }

    /**
     * Gets first name.
     *
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->response['first_name'] ?: null;
    }

    /**
     * Gets last name.
     *
     * @return string|null
     */
    public function getLastName()
    {
        return $this->response['last_name'] ?: null;
    }

    /**
     * Gets avatar url.
     *
     * @return string|null
     */
    public function getAvatar()
    {
        return $this->response['default_avatar'] ?: null;

	/**
     * Gets the gender.
     *
     * @return string|null
     */
    public function getGender()
    {
        return $this->response['sex'] ?: null;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return $this->response;
    }
}
