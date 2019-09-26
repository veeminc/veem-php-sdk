<?php

namespace Veem\clients;

use Veem\converters\AttachmentConverter;
use Veem\model\Attachment;

class AttachmentClient extends BaseClient
{

    const API_URL = "/veem/v1.1/attachments";

    public function upload(Attachment $attachment, $description = null)
    {
        /*
            Upload an attachment to Veem. The attachment can be referenced from
            other entities, like Payment and Invoice.

            @param attachment: An Attachment with a valid file path to a
                               readable file
            @param description: Attachment description
            @return A new Attachment with name and referenceId set
                 or ErrorResponse If the provided Attachment path is invalid, or
                                  if uploading fails.
        */
        $response = $this->postRequest(
            self::API_URL,
            [
                'multipart' => [
                    [
                        'name'     => 'description',
                        'contents' => $description
                    ],
                    [
                        'name'     => 'file',
                        'contents' => fopen($attachment->getPath(), 'r')
                    ]
                ]
            ],
            null,
            null,
            false
        );
        return AttachmentConverter::convertResponse($response);
    }

    public function download(Attachment $request, $targetDirectory = null)
    {
        /*
            Download an attachment from Veem.

            @param attachment: An Attachment with a valid name and referenceId
            @param targetDirectory: The directory where the downloaded file will
                                    be stored
            @return target file path to the downloaded attachment
        */
        if (!empty($targetDirectory))
        {
            if (!empty($request) && !empty($request->getName()))
                $path = join(DIRECTORY_SEPARATOR, array($targetDirectory, $request->getName()));
            else
                $path = tempnam($targetDirectory, 'VEEM');
        } else if (!empty($request) && !empty($request->getPath())) {
            $path = $request->getPath();
        } else if (!empty($request) && !empty($request->getName())) {
            $path = join(DIRECTORY_SEPARATOR, array(sys_get_temp_dir(), $request->getName()));
        } else {
            $path = tempnam(sys_get_temp_dir(), 'VEEM');
        }
        $this->getRequest(
            self::API_URL,
            AttachmentConverter::convertRequest($request),
            null,
            ['sink' => $path],
            false
        );

        return $path;
    }
}
